<?php

namespace Modules\PageExtension\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\PageExtension\Composers\PageExtensionComposer;

class PageExtensionServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        view()->composer('page::admin.edit', PageExtensionComposer::class);
    }

    public function boot()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\PageExtension\Repositories\PageExtensionRepository',
            function () {
                $repository = new \Modules\PageExtension\Repositories\Eloquent\EloquentPageExtensionRepository(new \Modules\PageExtension\Entities\PageExtension());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\PageExtension\Repositories\Cache\CachePageExtensionDecorator($repository);
            }
        );
// add bindings

    }
}
