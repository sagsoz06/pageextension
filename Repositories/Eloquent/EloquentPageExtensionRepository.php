<?php

namespace Modules\PageExtension\Repositories\Eloquent;

use Modules\PageExtension\Repositories\PageExtensionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPageExtensionRepository extends EloquentBaseRepository implements PageExtensionRepository
{
    public function findForPage($pageId)
    {
        return $this->model->wherePageId($pageId)->first();
    }
}
