<?php

namespace App\Http\Controllers\Admin;

use Google\Client;
use Google\Service\AnalyticsData;
use Google\Service\AnalyticsData\RunReportRequest;
use Google\Service\AnalyticsData\RunRealtimeReportRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AnalyticsController extends Controller
{
    private string $property = 'properties/509783221';

    private string $searchConsoleSite = 'sc-domain:shivatechdigital.com';

    private ?string $lastGscError = null;

    private function GA()
    {
        $client = new Client();
        $client->setAuthConfig($this->googleCredentialsPath());
        $client->addScope('https://www.googleapis.com/auth/analytics.readonly');
        return new AnalyticsData($client);
    }

    // -------------------------------------- DASHBOARD
    public function dashboard()
    {   
        return view('adminDashboard.pages.homepage'); // 🔥 Update your Blade Name
    }

    // -------------------------------------- REALTIME USERS
    public function realtime()
    {
        $analytics = $this->GA();

        $request = new RunRealtimeReportRequest([
            'metrics'=>[['name'=>'activeUsers']]
        ]);

        $response = $analytics->properties->runRealtimeReport($this->property, $request);

        return response()->json([
            'activeUsers' => $response->getRows()[0]->getMetricValues()[0]->getValue() ?? 0
        ]);
    }

    // -------------------------------------- USERS LAST 30 DAYS
    public function users()
    {
        $analytics = $this->GA();

        $request = new RunReportRequest([
            'dateRanges'=>[['startDate'=>'30daysAgo','endDate'=>'today']],
            'metrics'=>[['name'=>'activeUsers']]
        ]);

        $response = $analytics->properties->runReport($this->property,$request);

        return response()->json([
            'users_30_days' => $response->getRows()[0]->getMetricValues()[0]->getValue() ?? 0
        ]);
    }

    // -------------------------------------- TOP PAGES
    public function pages()
    {
        return $this->formatReport('pagePath','screenPageViews');
    }

    // -------------------------------------- COUNTRY USERS
    public function country()
    {
        return $this->formatReport('country','activeUsers');
    }

    // -------------------------------------- TRAFFIC SOURCE
    public function source()
    {
        return $this->formatReport('sessionSource','sessions');
    }

    // -------------------------------------- DEVICE CATEGORY
    public function device()
    {
        return $this->formatReport('deviceCategory','activeUsers');
    }

    // -------------------------------------- MONTHLY VISITORS (CHART)
    public function monthly()
    {
        return $this->formatReport('date','activeUsers');
    }

    // -------------------------------------- SEARCH CONSOLE FULL DASHBOARD
    public function searchConsoleDashboard(Request $request)
    {
        $this->lastGscError = null;

        [$start, $end, $rangeKey] = $this->resolveDateRange($request);
        $days = $start->diffInDays($end) + 1;
        $compareEnabled = $this->toBoolean($request->query('compare', '1'));

        $previousEnd = $start->copy()->subDay();
        $previousStart = $previousEnd->copy()->subDays($days - 1);

        $currentTotals = $this->getGscTotals($start, $end);
        $previousTotals = $compareEnabled
            ? $this->getGscTotals($previousStart, $previousEnd)
            : [
                'clicks' => 0,
                'impressions' => 0,
                'ctr' => 0,
                'position' => 0,
            ];

        $seriesRows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'dimensions' => ['date'],
            'rowLimit' => 365,
        ]);

        $topQueryRows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'dimensions' => ['query'],
            'rowLimit' => 10,
        ]);

        $topPageRows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'dimensions' => ['page'],
            'rowLimit' => 10,
        ]);

        $countryRows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'dimensions' => ['country'],
            'rowLimit' => 8,
        ]);

        $deviceRows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'dimensions' => ['device'],
            'rowLimit' => 8,
        ]);

        $response = [
            'ok' => $this->lastGscError === null,
            'message' => $this->lastGscError,
            'source' => 'google-search-console',
            'range' => [
                'key' => $rangeKey,
                'days' => $days,
                'compare_enabled' => $compareEnabled,
            ],
            'date_range' => [
                'start' => $start->toDateString(),
                'end' => $end->toDateString(),
                'previous_start' => $compareEnabled ? $previousStart->toDateString() : null,
                'previous_end' => $compareEnabled ? $previousEnd->toDateString() : null,
            ],
            'kpis' => [
                'clicks' => (int) ($currentTotals['clicks'] ?? 0),
                'impressions' => (int) ($currentTotals['impressions'] ?? 0),
                'ctr' => round(((float) ($currentTotals['ctr'] ?? 0)) * 100, 2),
                'position' => round((float) ($currentTotals['position'] ?? 0), 2),
                'top_queries_count' => count($topQueryRows),
                'top_pages_count' => count($topPageRows),
            ],
            'growth' => [
                'clicks' => $compareEnabled ? $this->growthPercent((float) ($currentTotals['clicks'] ?? 0), (float) ($previousTotals['clicks'] ?? 0)) : null,
                'impressions' => $compareEnabled ? $this->growthPercent((float) ($currentTotals['impressions'] ?? 0), (float) ($previousTotals['impressions'] ?? 0)) : null,
                'ctr' => $compareEnabled ? $this->growthPercent((float) ($currentTotals['ctr'] ?? 0), (float) ($previousTotals['ctr'] ?? 0)) : null,
                'position' => $compareEnabled ? $this->growthPercent((float) ($currentTotals['position'] ?? 0), (float) ($previousTotals['position'] ?? 0)) : null,
            ],
            'series' => array_map(function (array $row) {
                return [
                    'date' => $row['keys'][0] ?? null,
                    'clicks' => (int) ($row['clicks'] ?? 0),
                    'impressions' => (int) ($row['impressions'] ?? 0),
                    'ctr' => round(((float) ($row['ctr'] ?? 0)) * 100, 2),
                    'position' => round((float) ($row['position'] ?? 0), 2),
                ];
            }, $seriesRows),
            'top_queries' => array_map(function (array $row) {
                return [
                    'query' => $row['keys'][0] ?? '(unknown)',
                    'clicks' => (int) ($row['clicks'] ?? 0),
                    'impressions' => (int) ($row['impressions'] ?? 0),
                    'ctr' => round(((float) ($row['ctr'] ?? 0)) * 100, 2),
                    'position' => round((float) ($row['position'] ?? 0), 2),
                ];
            }, $topQueryRows),
            'top_pages' => array_map(function (array $row) {
                return [
                    'page' => $row['keys'][0] ?? '(unknown)',
                    'clicks' => (int) ($row['clicks'] ?? 0),
                    'impressions' => (int) ($row['impressions'] ?? 0),
                    'ctr' => round(((float) ($row['ctr'] ?? 0)) * 100, 2),
                    'position' => round((float) ($row['position'] ?? 0), 2),
                ];
            }, $topPageRows),
            'countries' => array_map(function (array $row) {
                return [
                    'label' => $row['keys'][0] ?? 'Unknown',
                    'clicks' => (int) ($row['clicks'] ?? 0),
                ];
            }, $countryRows),
            'devices' => array_map(function (array $row) {
                return [
                    'label' => ucfirst(strtolower($row['keys'][0] ?? 'unknown')),
                    'clicks' => (int) ($row['clicks'] ?? 0),
                ];
            }, $deviceRows),
        ];

        return response()->json($response);
    }

    // 🔥 UNIVERSAL FORMAT FUNCTION (Fixes all views)
    private function formatReport($dimension, $metric)
    {
        $analytics = $this->GA();

        $request = new RunReportRequest([
            'dateRanges'=>[['startDate'=>'30daysAgo','endDate'=>'today']],
            'metrics'=>[['name'=>$metric]],
            'dimensions'=>[['name'=>$dimension]]
        ]);

        $response = $analytics->properties->runReport($this->property,$request);

        $data = [];

        foreach($response->getRows() ?? [] as $row){
            $data[] = [
                'label' => $row->getDimensionValues()[0]->getValue(),
                'value' => $row->getMetricValues()[0]->getValue(),
            ];
        }

        return response()->json($data);
    }

    private function getGscTotals(Carbon $start, Carbon $end): array
    {
        $rows = $this->gscQuery([
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
            'rowLimit' => 1,
        ]);

        return $rows[0] ?? [
            'clicks' => 0,
            'impressions' => 0,
            'ctr' => 0,
            'position' => 0,
        ];
    }

    private function growthPercent(float $current, float $previous): float
    {
        if ($previous == 0.0) {
            return $current > 0 ? 100.0 : 0.0;
        }

        return round((($current - $previous) / $previous) * 100, 2);
    }

    private function gscQuery(array $payload): array
    {
        try {
            $client = new Client();
            $client->setAuthConfig($this->googleCredentialsPath());
            $client->addScope('https://www.googleapis.com/auth/webmasters.readonly');

            $siteUrl = urlencode(config('services.search_console.site_url', $this->searchConsoleSite));
            $httpClient = $client->authorize();
            $response = $httpClient->post(
                "https://searchconsole.googleapis.com/webmasters/v3/sites/{$siteUrl}/searchAnalytics/query",
                ['json' => $payload]
            );

            $json = json_decode((string) $response->getBody(), true);

            return $json['rows'] ?? [];
        } catch (\Throwable $exception) {
            if ($this->lastGscError === null) {
                $this->lastGscError = $exception->getMessage();
            }

            Log::warning('Search Console API query failed', [
                'message' => $exception->getMessage(),
            ]);

            return [];
        }
    }

    private function googleCredentialsPath(): string
    {
        $configuredPath = config('services.google.credentials_json_path');

        if (!empty($configuredPath)) {
            return str_starts_with($configuredPath, DIRECTORY_SEPARATOR)
                ? $configuredPath
                : base_path($configuredPath);
        }

        return storage_path('app/ga-credentials.json');
    }

    private function resolveDateRange(Request $request): array
    {
        $today = Carbon::today();
        $range = strtolower((string) $request->query('range', '28d'));

        if ($range === '7d') {
            return [$today->copy()->subDays(6), $today, '7d'];
        }

        if ($range === '3m') {
            return [$today->copy()->subMonthsNoOverflow(3)->addDay(), $today, '3m'];
        }

        if ($range === 'custom') {
            $customStart = $request->query('start_date');
            $customEnd = $request->query('end_date');

            if (!empty($customStart) && !empty($customEnd)) {
                try {
                    $start = Carbon::parse((string) $customStart)->startOfDay();
                    $end = Carbon::parse((string) $customEnd)->startOfDay();

                    if ($start->gt($end)) {
                        [$start, $end] = [$end, $start];
                    }

                    if ($end->gt($today)) {
                        $end = $today;
                    }

                    return [$start, $end, 'custom'];
                } catch (\Throwable $exception) {
                    Log::warning('Invalid custom date range', ['message' => $exception->getMessage()]);
                }
            }
        }

        return [$today->copy()->subDays(27), $today, '28d'];
    }

    private function toBoolean(mixed $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        $normalized = strtolower((string) $value);

        return !in_array($normalized, ['0', 'false', 'off', 'no'], true);
    }
}
