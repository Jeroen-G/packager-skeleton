<?php

namespace :uc:vendor\:uc:package;

use Illuminate\Support\ServiceProvider;

class :uc:packageServiceProvider extends ServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', ':lc:vendor');
    // $this->loadViewsFrom(__DIR__.'/../resources/views', ':lc:vendor');
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

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
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/:lc:package.php', ':lc:package');

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
    return [
      ':lc:package'
    ];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  protected function bootForConsole()
  {
    // Collect vendor name, and package name.
    $vendorName = basename(realpath(__DIR__ . '/../../'));
    $packageName = basename(realpath(__DIR__ . '/../'));

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

    // Register package commands.
    $commands = [];
    foreach (glob(__DIR__ . '/Console/Commands/*.php') as $row) {
      // init class path
      $classPath = '\\:uc:vendor\\:uc:package\\Console\\Commands\\';

      // class path with command file class name
      $commandFileClass = str_replace('.php', '', basename($row));

      $classPath .= $commandFileClass;

      $commands[] = $classPath;
    }

    $this->commands($commands);
  }
}
