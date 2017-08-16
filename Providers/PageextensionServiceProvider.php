<?php

namespace Modules\Pageextension\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Pageextension\Composers\PageextensionComposer;
use Modules\Pageextension\Events\Handlers\RegisterPageExtensionSidebar;

class PageextensionServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
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

        view()->composer('page::admin.edit', PageextensionComposer::class);

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('pageextension', RegisterPageExtensionSidebar::class)
        );
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
            'Modules\Pageextension\Repositories\PageextensionRepository',
            function () {
                $repository = new \Modules\Pageextension\Repositories\Eloquent\EloquentPageextensionRepository(new \Modules\Pageextension\Entities\Pageextension());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Pageextension\Repositories\Cache\CachePageextensionDecorator($repository);
            }
        );
// add bindings

    }
}
