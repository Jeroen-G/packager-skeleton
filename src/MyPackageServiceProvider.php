<?php

namespace :uc:vendor\:uc:package;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use :uc:vendor\:uc:package\Contracts\:uc:packageRepositoryInterface;
use :uc:vendor\:uc:package\Repository\:uc:packageRepository;
use :uc:vendor\:uc:package\Models\:uc:package;
use :uc:vendor\:uc:package\Subscribers\:uc:packageEventSubscriber;

class :uc:packageServiceProvider extends EventServiceProvider
{
    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        :uc:packageEventSubscriber::class,
    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', ':lc:vendor');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', ':lc:vendor');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();
        $this->mergeConfigFrom(__DIR__.'/../config/:lc:package.php', ':lc:package');

        $this->app->singleton(:uc:packageRepositoryInterface::class, :uc:packageRepository::class);

        // Register the service the package provides.
        $this->app->singleton(':lc:package', function ($app) {
            return new :uc:package;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [':lc:package'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/:lc:package.php' => config_path(':lc:package.php'),
        ], ':lc:package.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/:lc:vendor'),
        ], ':lc:package.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/:lc:vendor'),
        ], ':lc:package.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/:lc:vendor'),
        ], ':lc:package.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
