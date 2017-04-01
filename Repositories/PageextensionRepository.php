<?php

namespace Modules\PageExtension\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PageExtensionRepository extends BaseRepository
{
    public function findForPage($pageId);
}
