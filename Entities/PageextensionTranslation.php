<?php

namespace Modules\Pageextension\Entities;

use Illuminate\Database\Eloquent\Model;

class PageextensionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['sub_title'];
    protected $table = 'page__extension_translations';
}
