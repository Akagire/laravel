<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        /* Closure
        View::composer(
          'hello.index', function($view){
            $view->with('view_message', 'composer message');
          }
        );
        */

        /* Class */
        View::composer(
          'hello.index', 'App\Http\Composers\HelloComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
