<?php

namespace Modules\Pageextension\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PageextensionRepository extends BaseRepository
{
    public function findForPage($pageId);
}
