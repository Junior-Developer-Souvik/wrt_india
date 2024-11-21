<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('*', function($view) {
            $ServiceTableExists = Schema::hasTable('services');
            if ($ServiceTableExists) {
                $Services = Service::where('status',1)
                                    ->where('deleted_at',1)
                                    ->orderByRaw("FIELD(title, 'Condition Monitoring', 'Online Oil Monitoring', 'On-Site Lubricant Monitoring', 'Vision Tech Solutions')")
                                    ->get();
                view()->share('Services', $Services);
            }
            
            $userSubscriptionRoute = route('front.user_subcription');
            view()->share('userSubscriptionRoute', $userSubscriptionRoute);   
        });
    }
}
