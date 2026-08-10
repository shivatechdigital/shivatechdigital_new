<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\ServiceMeta;

/**
 * Fix: Change @type from "Service" to "LocalBusiness" in schema_markup
 * for pages that have aggregateRating — Google only supports aggregateRating
 * inside LocalBusiness, Product, Recipe etc., NOT Service.
 * This fixes: "Invalid object type for field <parent_node>" rich result error.
 */
return new class extends Migration
{
    private array $slugsToFix = [
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

    public function up(): void
    {
        foreach ($this->slugsToFix as $slug) {
            $page = ServiceMeta::where('page_slug', $slug)->first();
            if (! $page || ! $page->schema_markup) {
                continue;
            }

            $schema = json_decode($page->schema_markup, true);
            if (! $schema) {
                continue;
            }

            // Change Service → LocalBusiness so aggregateRating is valid
            if (($schema['@type'] ?? '') === 'Service') {
                $schema['@type'] = 'LocalBusiness';

                // LocalBusiness requires these fields
                if (! isset($schema['url'])) {
                    $schema['url'] = 'https://shivatechdigital.com/' . $slug;
                }
                if (! isset($schema['telephone'])) {
                    $schema['telephone'] = '+91-7007294764';
                }
                if (! isset($schema['address'])) {
                    $schema['address'] = [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Sector 62',
                        'addressLocality' => 'Noida',
                        'addressRegion'   => 'Uttar Pradesh',
                        'postalCode'      => '201309',
                        'addressCountry'  => 'IN',
                    ];
                }

                $page->schema_markup = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $page->save();
            }
        }
    }

    public function down(): void
    {
        // Revert LocalBusiness → Service (best effort)
        foreach ($this->slugsToFix as $slug) {
            $page = ServiceMeta::where('page_slug', $slug)->first();
            if (! $page || ! $page->schema_markup) {
                continue;
            }
            $schema = json_decode($page->schema_markup, true);
            if ($schema && ($schema['@type'] ?? '') === 'LocalBusiness') {
                $schema['@type'] = 'Service';
                unset($schema['telephone'], $schema['address']);
                $page->schema_markup = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $page->save();
            }
        }
    }
};
