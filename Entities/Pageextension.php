<?php

namespace Modules\Pageextension\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Pageextension\Presenters\PageextensionPresenter;

class Pageextension extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'page__extensions';
    public $translatedAttributes = ['sub_title'];
    protected $fillable = ['page_id', 'sub_title', 'video', 'icon'];

    public $presenter = PageextensionPresenter::class;
}
