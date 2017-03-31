<?php namespace Modules\PageExtension\Composers;


use Illuminate\Contracts\View\View;
use Modules\PageExtension\Repositories\PageExtensionRepository;

class PageExtensionComposer
{
    /**
     * @var PageExtensionRepository
     */
    private $pageExtensionRepository;

    /**
     * PageExtensionComposer constructor.
     */
    public function __construct(PageExtensionRepository $pageExtensionRepository)
    {
        $this->pageExtensionRepository = $pageExtensionRepository;
    }

    public function compose(View $view)
    {
        $pageExtension = $this->pageExtensionRepository->findForPage(request()->route('page')->id);
        $view->with('pageExtension', $pageExtension);
    }
}