<?php

namespace App\Console\Commands;

use App\Models\ServiceMeta;
use Illuminate\Console\Command;

class FixServiceSchemas extends Command
{
    protected $signature = 'gsc:fix-schemas {--dry-run : Show what would be changed without saving}';
    protected $description = 'Fix invalid Service @type → LocalBusiness in service_meta schema_markup';

    private array $targetSlugs = [
        'services/ui-ux-design',
        'services/ecommerce-development',
        'services/seo-services',
        'services/content-marketing',
        'services/web-development',
        'services/mobile-app-development',
        'services/digital-marketing',
        'services/social-media-marketing',
        'services/cloud-solutions',
        'services/maintenance-support',
        'services/branding-services',
        'services/graphic-design',
        'services/video-production',
    ];

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');
        $this->info($dryRun ? '🔍 DRY RUN mode' : '🔧 Fixing schemas...');
        $this->newLine();

        $fixed   = 0;
        $skipped = 0;
        $missing = 0;

        foreach ($this->targetSlugs as $slug) {
            $meta = ServiceMeta::where('page_slug', $slug)->first();

            if (! $meta) {
                $this->warn("  NOT FOUND: {$slug}");
                $missing++;
                continue;
            }

            if (empty($meta->schema_markup)) {
                $this->line("  EMPTY:     {$slug}");
                $skipped++;
                continue;
            }

            $schema = json_decode($meta->schema_markup, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error("  BAD JSON:  {$slug} — " . json_last_error_msg());
                $skipped++;
                continue;
            }

            $currentType = $schema['@type'] ?? 'none';

            if ($currentType === 'LocalBusiness') {
                $this->line("  OK:        {$slug} (already LocalBusiness)");
                $skipped++;
                continue;
            }

            $this->line("  FIX:       {$slug} | @type: {$currentType} → LocalBusiness");

            if (! $dryRun) {
                $schema['@type'] = 'LocalBusiness';

                // Ensure required LocalBusiness fields
                if (! isset($schema['url']))       $schema['url']       = 'https://shivatechdigital.com/' . $slug;
                if (! isset($schema['telephone'])) $schema['telephone'] = '+91-7007294764';
                if (! isset($schema['address'])) {
                    $schema['address'] = [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Block A, Industrial Area, Sector 62',
                        'addressLocality' => 'Noida',
                        'addressRegion'   => 'Uttar Pradesh',
                        'postalCode'      => '201309',
                        'addressCountry'  => 'IN',
                    ];
                }

                $meta->schema_markup = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $meta->save();
            }

            $fixed++;
        }

        $this->newLine();
        $this->info("=== Summary ===");
        $this->line("  Fixed:   {$fixed}");
        $this->line("  Skipped: {$skipped}");
        $this->line("  Missing: {$missing}");

        if ($missing > 0) {
            $this->newLine();
            $this->warn("Missing slugs means service_meta records don't exist for those pages.");
            $this->warn("Run: php artisan db:seed --class=ServiceSchemasSeeder to create them.");
        }

        if (! $dryRun && $fixed > 0) {
            $this->newLine();
            $this->info("✅ Done! Now run: php artisan cache:clear");
        }

        return self::SUCCESS;
    }
}
