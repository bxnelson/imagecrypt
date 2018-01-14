<?php namespace App\Impl\Exception;

use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{

    public function register()
    {
        $app = $this->app;

        $app->singleton('impl.exception',function($app)
        {
            return new NotifyHandler( $app['impl.notifier'] );
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $app->error(function(ImplException $e) use ($app)
        {
            $app['impl.exception']->handle($e);
        });
    }
}