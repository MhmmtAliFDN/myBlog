<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('backend.inc.notifications', function ($view) {
            $view->with('waitingContacts', Contact::where('status', 'waiting')->select('title','name', 'created_at')->get());
        });
    }
}
