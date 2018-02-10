<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

//use Illuminate\Validation\Validator;
use Validator;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Validators\HelloValidator;

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

        /* Validator Class使ってカスタムバリデーション
        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages){
            return new HelloValidator($translator, $data, $rules, $messages);
        });
        */

        /* Validatorを拡張してバリデーション */
        /* Validator::extend */
        Validator::extend('hello', function($attribute, $value, $parameters, $validator){
            return $value % 2 == 0;
        });
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
