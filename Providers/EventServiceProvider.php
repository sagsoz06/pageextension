<?php namespace Modules\Pageextension\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasUpdated;
use Modules\Pageextension\Events\Handlers\StorePageextensionData;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
      PageWasCreated::class => [
          StorePageextensionData::class
      ],
      PageWasUpdated::class => [
          StorePageextensionData::class
      ]
    ];
}