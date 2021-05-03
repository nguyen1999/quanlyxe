<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        view()->composer('admin.layouts.index',function($view){
            $data = DB::select(
                'SELECT COUNT(*) count_hire,l.car_id,x.name FROM lichdatxe l,xe x WHERE l.status = 0 and x.id = l.car_id GROUP BY l.car_id,x.name'
            );
            $view->with('data',$data);
        });
    }
}
