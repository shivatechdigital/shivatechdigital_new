<?php

namespace App\Http\Controllers\Admin;

use Google\Client;
use Google\Service\AnalyticsData;
use Google\Service\AnalyticsData\RunReportRequest;
use Google\Service\AnalyticsData\RunRealtimeReportRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    private function GA()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/ga-credentials.json'));
        $client->addScope('https://www.googleapis.com/auth/analytics.readonly');
        return new AnalyticsData($client);
    }

    private $property = "properties/509783221"; // ★ IMPORTANT Correct Format

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
}
