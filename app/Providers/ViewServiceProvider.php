<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share only with website views (not admin/emails)
        View::composer('website.*', function ($view) {
            $view->with('settings', Setting::getSettings());
        });
    }
}