<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\RoomRequest;
use App\Http\Middleware\AdminOnly;

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
        Route::aliasMiddleware('admin', AdminOnly::class);
        View::composer('*', function ($view) {
            $pendingRequestCount = RoomRequest::where('status', 'pending')->count();
            $view->with('pendingRequestCount', $pendingRequestCount);
        });
    }
}
