<?php

namespace Modules\Pageextension\Repositories\Cache;

use Modules\Pageextension\Repositories\PageextensionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePageextensionDecorator extends BaseCacheDecorator implements PageextensionRepository
{
    public function __construct(PageextensionRepository $pageextension)
    {
        parent::__construct();
        $this->entityName = 'pageextension.pageextensions';
        $this->repository = $pageextension;
    }

    public function findForPage($pageId)
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember("{$this->locale}.{$this->entityName}.findForPage.{$pageId}", $this->cacheTime,
                function () use ($pageId) {
                    return $this->repository->findForPage($pageId);
                }
            );
    }
}
