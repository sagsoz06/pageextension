<?php namespace Modules\PageExtension\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasUpdated;
use Modules\PageExtension\Events\Handlers\StorePageExtensionData;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
      PageWasCreated::class => [
          StorePageExtensionData::class
      ],
      PageWasUpdated::class => [
          StorePageExtensionData::class
      ]
    ];
}