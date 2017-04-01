<?php namespace Modules\Pageextension\Presenters;

use Embed\Embed;
use Embed\Utils;
use Laracasts\Presenter\Presenter;

class PageextensionPresenter extends Presenter
{
    public function video($width, $height)
    {
        if(isset($this->entity->video) && ! empty($this->entity->video))
        {
            $info = Embed::create($this->entity->video);
            $providers = $info->getProviders();
            $oembed = $providers['html'];
            return Utils::iframe($oembed->get('twitter:player'), $width, $height);
        }
        return null;
    }
}