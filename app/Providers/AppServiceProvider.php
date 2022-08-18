<?php

namespace App\Providers;

use View;
use App\Models\Boxmail;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function($view)
        {
            $mail = Boxmail::where('read', '0')->count();
            $total = $mail;
            $data = [
                'nbremail' => $mail,
                'total' => $total
            ];
            $view->with($data);
        });
    }
}
