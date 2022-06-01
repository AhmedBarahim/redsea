<?php

namespace App\Providers;

use App\Models\Winner;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        if(request()->is('admin/winners') || (request()->is('admin/new-winners')))
        {
            $winners = Winner::where('is_seen' , false)->get();
            foreach($winners as  $winner) {
                $winner->is_seen = true;
                $winner->save();
            }
        }

        View::share('new_winners_count', Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->where('is_seen',false)->where('prizes.redeemed',true)->select('winners.*')->count());
    }
}
