<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;
use Google\Client as GoogleClient;
use Illuminate\Console\Command;

class InspectGscUrls extends Command
{
    protected $signature = 'gsc:inspect
                            {--site=https://shivatechdigital.com/ : The GSC property URL (must match exactly)}
                            {--output=gsc_inspection_results.csv : Output CSV filename in storage/app/}
                            {--delay=150 : Delay in ms between requests (default 150ms = ~6 req/sec)}
                            {--debug : Show raw API response for first URL and exit}';

    protected $description = 'Inspect all site URLs via Google Search Console URL Inspection API and export results to CSV';

    private string $siteUrl;
    private array $results = [];

    public function handle(): int
    {
        $this->siteUrl = $this->option('site');
        $outputFile    = storage_path('app/' . $this->option('output'));
        $delay         = (int) $this->option('delay') * 1000; // convert ms to microseconds

        $this->info('Initializing Google Search Console client...');

        $client = $this->buildGoogleClient();
        if (! $client) {
            return self::FAILURE;
        }

        $httpClient = $client->authorize();

        // Debug mode: show raw response for first URL and exit
        if ($this->option('debug')) {
            return $this->debugSingleUrl($httpClient);
        }

        $urls = $this->collectUrls();
        $this->info('Total URLs to inspect: <comment>' . count($urls) . '</comment>');
        $this->newLine();

        $bar = $this->output->createProgressBar(count($urls));
        $bar->setFormat(' %current%/%max% [%bar%] %percent:3s%% | %elapsed:6s% elapsed | <info>%message%</info>');
        $bar->start();

        foreach ($urls as $url) {
            $bar->setMessage(parse_url($url, PHP_URL_PATH) ?: '/');
            $this->inspectUrl($httpClient, $url);
            $bar->advance();
            usleep($delay);
        }

        $bar->finish();
        $this->newLine(2);

        $this->exportCsv($outputFile);
        $this->info("CSV saved: <comment>{$outputFile}</comment>");
        $this->printSummary();

        return self::SUCCESS;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Debug
    // ─────────────────────────────────────────────────────────────────────────

    private function debugSingleUrl($httpClient): int
    {
        $testUrl = rtrim($this->siteUrl, '/') . '/';
        $this->info("Debug: Inspecting <comment>{$testUrl}</comment>");
        $this->info("Using siteUrl: <comment>{$this->siteUrl}</comment>");
        $this->newLine();

        try {
            $response = $httpClient->post(
                'https://searchconsole.googleapis.com/v1/urlInspection/index:inspect',
                [
                    'json' => [
                        'inspectionUrl' => $testUrl,
                        'siteUrl'       => $this->siteUrl,
                    ],
                ]
            );

            $body = (string) $response->getBody();
            $this->line('<info>HTTP Status:</info> ' . $response->getStatusCode());
            $this->line('<info>Raw Response:</info>');
            $this->line(json_encode(json_decode($body), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $this->error('HTTP Error: ' . $e->getResponse()->getStatusCode());
            $this->line($e->getResponse()->getBody());
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }

        return self::SUCCESS;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Google Client
    // ─────────────────────────────────────────────────────────────────────────

    private function buildGoogleClient(): ?GoogleClient
    {
        $credentialsPath = storage_path('app/shivatechdigital-03ba56abbad2.json');

        if (! file_exists($credentialsPath)) {
            $this->error("Service account JSON not found at: {$credentialsPath}");
            $this->line('Place the file at: <comment>storage/app/shivatechdigital-03ba56abbad2.json</comment>');
            return null;
        }

        $client = new GoogleClient();
        $client->setAuthConfig($credentialsPath);
        $client->setScopes(['https://www.googleapis.com/auth/webmasters.readonly']);

        return $client;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // URL Collection
    // ─────────────────────────────────────────────────────────────────────────

    private function collectUrls(): array
    {
        $base = rtrim($this->siteUrl, '/');

        $urls = [
            // Core pages
            $base . '/',
            $base . '/about',
            $base . '/services',
            $base . '/contact',
            $base . '/portfolio',
            $base . '/privacy-policy',
            $base . '/terms-of-service',
            $base . '/blog',

            // Service pages
            $base . '/services/our-services',
            $base . '/services/web-development',
            $base . '/services/mobile-app-development',
            $base . '/services/ui-ux-design',
            $base . '/services/ecommerce-development',
            $base . '/services/digital-marketing',
            $base . '/services/seo-services',
            $base . '/services/social-media-marketing',
            $base . '/services/content-marketing',
            $base . '/services/cloud-solutions',
            $base . '/services/maintenance-support',
            $base . '/services/branding-services',
            $base . '/services/graphic-design',
            $base . '/services/video-production',

            // City-specific: Web Development
            $base . '/services/web-development-noida',
            $base . '/services/web-development-delhi',
            $base . '/services/web-development-gurgaon',
            $base . '/services/web-development-ghaziabad',

            // City-specific: Mobile App
            $base . '/services/mobile-app-development-noida',
            $base . '/services/mobile-app-development-delhi',
            $base . '/services/mobile-app-development-gurgaon',
            $base . '/services/mobile-app-development-ghaziabad',

            // City-specific: Cloud Migration
            $base . '/services/cloud-migration-noida',
            $base . '/services/cloud-migration-delhi',
            $base . '/services/cloud-migration-gurgaon',
            $base . '/services/cloud-migration-ghaziabad',
        ];

        // Blog posts (published only)
        BlogPost::where('status', 'published')
            ->pluck('slug')
            ->each(fn ($slug) => $urls[] = $base . '/blog/' . $slug);

        // Categories
        Category::pluck('slug')
            ->each(fn ($slug) => $urls[] = $base . '/category/' . $slug);

        // Tags
        Tag::pluck('slug')
            ->each(fn ($slug) => $urls[] = $base . '/tag/' . $slug);

        return array_unique($urls);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // URL Inspection API Call
    // ─────────────────────────────────────────────────────────────────────────

    private function inspectUrl($httpClient, string $url): void
    {
        try {
            $response = $httpClient->post(
                'https://searchconsole.googleapis.com/v1/urlInspection/index:inspect',
                [
                    'json' => [
                        'inspectionUrl' => $url,
                        'siteUrl'       => $this->siteUrl,
                    ],
                ]
            );

            $data   = json_decode((string) $response->getBody(), true);
            $result = $data['inspectionResult']     ?? [];
            $index  = $result['indexStatusResult']  ?? [];
            $rich   = $result['richResultsResult']  ?? [];
            $mobile = $result['mobileUsabilityResult'] ?? [];

            // Flatten rich results issues
            $richIssues = [];
            foreach ($rich['detectedItems'] ?? [] as $detectedItem) {
                foreach ($detectedItem['items'] ?? [] as $item) {
                    foreach ($item['issues'] ?? [] as $issue) {
                        $msg = $issue['issueMessage'] ?? '';
                        if ($msg) {
                            $richIssues[] = $msg;
                        }
                    }
                }
            }

            // Flatten mobile usability issues
            $mobileIssues = [];
            foreach ($mobile['issues'] ?? [] as $issue) {
                $mobileIssues[] = $issue['issueType'] ?? '';
            }

            $this->results[] = [
                'url'              => $url,
                'verdict'          => $index['verdict']          ?? 'UNKNOWN',
                'coverage_state'   => $index['coverageState']    ?? '',
                'indexing_state'   => $index['indexingState']    ?? '',
                'last_crawl_time'  => $index['lastCrawlTime']    ?? 'Never',
                'crawled_as'       => $index['crawledAs']        ?? '',
                'robots_txt'       => $index['robotsTxtState']   ?? '',
                'canonical'        => $index['googleCanonical']  ?? '',
                'rich_verdict'     => $rich['verdict']           ?? 'N/A',
                'rich_issues'      => implode(' | ', $richIssues),
                'mobile_verdict'   => $mobile['verdict']         ?? 'N/A',
                'mobile_issues'    => implode(' | ', $mobileIssues),
            ];
        } catch (\Exception $e) {
            $this->results[] = [
                'url'              => $url,
                'verdict'          => 'API_ERROR',
                'coverage_state'   => $e->getMessage(),
                'indexing_state'   => '',
                'last_crawl_time'  => '',
                'crawled_as'       => '',
                'robots_txt'       => '',
                'canonical'        => '',
                'rich_verdict'     => '',
                'rich_issues'      => '',
                'mobile_verdict'   => '',
                'mobile_issues'    => '',
            ];
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CSV Export
    // ─────────────────────────────────────────────────────────────────────────

    private function exportCsv(string $path): void
    {
        $file = fopen($path, 'w');

        fputcsv($file, [
            'URL',
            'Verdict',
            'Coverage State',
            'Indexing State',
            'Last Crawl Time',
            'Crawled As',
            'Robots.txt State',
            'Google Canonical',
            'Rich Results Verdict',
            'Rich Results Issues',
            'Mobile Usability Verdict',
            'Mobile Usability Issues',
        ]);

        foreach ($this->results as $row) {
            fputcsv($file, array_values($row));
        }

        fclose($file);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Summary Table
    // ─────────────────────────────────────────────────────────────────────────

    private function printSummary(): void
    {
        $verdicts = array_count_values(array_column($this->results, 'verdict'));
        arsort($verdicts);

        $this->newLine();
        $this->info('=== Inspection Summary ===');
        $this->table(['Verdict', 'Count'], array_map(
            fn ($v, $c) => [$v, $c],
            array_keys($verdicts),
            array_values($verdicts)
        ));

        $errors = array_filter($this->results, fn ($r) => $r['verdict'] === 'API_ERROR');
        if (count($errors)) {
            $this->warn(count($errors) . ' URLs had API errors. Check CSV for details.');
        }

        $richFail = array_filter($this->results, fn ($r) => $r['rich_verdict'] === 'FAIL');
        if (count($richFail)) {
            $this->warn(count($richFail) . ' URLs have Rich Results issues:');
            foreach ($richFail as $r) {
                $this->line("  <comment>{$r['url']}</comment> — {$r['rich_issues']}");
            }
        }
    }
}
