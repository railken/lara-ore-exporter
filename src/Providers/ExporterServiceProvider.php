<?php

namespace Amethyst\Providers;

use Amethyst\Api\Support\Router;
use Amethyst\Common\CommonServiceProvider;
use Amethyst\Console\Commands\ExporterSeed;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class ExporterServiceProvider extends CommonServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();
        $this->commands([ExporterSeed::class]);
        $this->loadExtraRoutes();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();
        $this->app->register(\Amethyst\Providers\DataBuilderServiceProvider::class);
        $this->app->register(\Amethyst\Providers\FileServiceProvider::class);
    }

    /**
     * Load extra routes.
     */
    public function loadExtraRoutes()
    {
        $config = Config::get('amethyst.exporter.http.admin.exporter');

        if (Arr::get($config, 'enabled')) {
            Router::group('admin', Arr::get($config, 'router'), function ($router) use ($config) {
                $controller = Arr::get($config, 'controller');

                $router->post('/{id}/execute', ['as' => 'execute', 'uses' => $controller.'@execute']);
            });
        }
    }
}
