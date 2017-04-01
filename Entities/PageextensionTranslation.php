<?php

namespace Modules\PageExtension\Entities;

use Illuminate\Database\Eloquent\Model;

class PageExtensionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['sub_title'];
    protected $table = 'page__extension_translations';
}
