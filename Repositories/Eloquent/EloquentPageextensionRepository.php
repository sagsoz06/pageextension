<?php

namespace Modules\Pageextension\Repositories\Eloquent;

use Modules\Pageextension\Repositories\PageextensionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPageextensionRepository extends EloquentBaseRepository implements PageextensionRepository
{
    public function findForPage($pageId)
    {
        return $this->model->wherePageId($pageId)->first();
    }
}
