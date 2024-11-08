<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Mywork;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Support\Facades\View;
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
        $service=Service::count();
        View::share('service',$service);

        $mywork=Mywork::count();
        View::share('mywork',$mywork);

         $customer=User::where('type','customer')->count();
        View::share('customer',$customer);

        $totalbooking=Booking::where('payment','pending')->count();
        View::share('totalbooking',$totalbooking);

         $pendingbooking=Booking::where('payment','pending')->count();
        View::share('pendingbooking',$pendingbooking);

         $paidbooking=Booking::where('payment','paid')->count();
        View::share('paidbooking',$paidbooking);

         $cancelbooking=Booking::where('payment','paid')->count();
        View::share('cancelbooking',$cancelbooking);




    }
}