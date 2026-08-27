<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Observers\BlogPostObserver;
use App\Models\BlogPost;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::before(function ($user, $ability) {
            if (! $user) {
                return false;
            }

            if ($user->role === 'admin') {
                return true;
            }

            if (method_exists($user, 'hasPermission')) {
                return $user->hasPermission($ability) ? true : null;
            }

            return null;
        });

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

        BlogPost::observe(BlogPostObserver::class);
    }
}