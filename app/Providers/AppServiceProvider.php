<?php

namespace App\Providers;

use App\Models\Category;
use App\Policies\CategoryPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
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
        Gate::policy(Category::class, CategoryPolicy::class);

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        foreach ([
            'category-store',
            'category-update',
            'category-destroy',
            'skill-store',
            'skill-update',
            'skill-destroy',
        ] as $limiter) {
            $this->registerFormSubmissionLimiter($limiter);
        }
    }

    private function registerFormSubmissionLimiter(string $name): void
    {
        RateLimiter::for($name, function (Request $request) {
            return Limit::perSecond(1, 5)->by($request->user()?->id ?: $request->ip());
        });
    }
}
