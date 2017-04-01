<?php

namespace Modules\PageExtension\Repositories\Cache;

use Modules\PageExtension\Repositories\PageExtensionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePageExtensionDecorator extends BaseCacheDecorator implements PageExtensionRepository
{
    public function __construct(PageExtensionRepository $pageextension)
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
