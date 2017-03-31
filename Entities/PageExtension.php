<?php

namespace Modules\PageExtension\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\PageExtension\Presenters\PageExtensionPresenter;

class PageExtension extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'page__extensions';
    public $translatedAttributes = ['sub_title'];
    protected $fillable = ['page_id', 'sub_title', 'video'];

    public $presenter = PageExtensionPresenter::class;
}
