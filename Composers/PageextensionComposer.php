<?php namespace Modules\Pageextension\Composers;


use Illuminate\Contracts\View\View;
use Modules\Pageextension\Repositories\PageextensionRepository;

class PageextensionComposer
{
    /**
     * @var PageextensionRepository
     */
    private $pageExtensionRepository;

    /**
     * PageextensionComposer constructor.
     */
    public function __construct(PageextensionRepository $pageExtensionRepository)
    {
        $this->pageExtensionRepository = $pageExtensionRepository;
    }

    public function compose(View $view)
    {
        $pageExtension = $this->pageExtensionRepository->findForPage(request()->route('page')->id);
        $view->with('pageExtension', $pageExtension);
    }
}