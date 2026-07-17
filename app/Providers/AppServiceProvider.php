<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Observers\BlogPostObserver;
use App\Models\BlogPost;              // ← Yeh add karo

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (class_exists(\App\Models\Setting::class)) {
            View::composer('website.*', function ($view) {
                try {
                    $settings = \App\Models\Setting::getSettings();
                    $view->with('settings', $settings);
                } catch (\Exception $e) {
                    $view->with('settings', null);
                }
            });
        }

        BlogPost::observe(BlogPostObserver::class); // ✅ Ab kaam karega
    }
}