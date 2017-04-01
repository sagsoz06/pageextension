<?php  namespace Modules\Pageextension\Events\Handlers;


use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasDeleted;
use Modules\Page\Events\PageWasUpdated;
use Modules\Pageextension\Repositories\PageextensionRepository;

class StorePageextensionData
{
    /**
     * @var PageextensionRepository
     */
    private $pageExtensionRepository;

    public function __construct(PageextensionRepository $pageExtensionRepository)
    {

        $this->pageExtensionRepository = $pageExtensionRepository;
    }

    /**
     * @param PageWasCreated|PageWasUpdated $event
     * return mixed
     */
    public function handle($event)
    {
        try
        {
            if(get_class($event)  === PageWasCreated::class) {
                return $this->createPageextension($event->pageId, $event->data);
            }
            if(get_class($event) === PageWasDeleted::class) {
                if($pageExtension = $this->pageExtensionRepository->findForPage($event->page->id)) {
                    return $this->pageExtensionRepository->destroy($pageExtension);
                } else {
                    return null;
                }
            }
            $pageExtension = $this->pageExtensionRepository->findForPage($event->pageId);
            if($pageExtension) {
                return $this->pageExtensionRepository->update($pageExtension, $event->data);
            }
            return $this->createPageextension($event->pageId, $event->data);
        }
        catch (\Exception $exception)
        {
            return null;
        }
    }

    private function createPageextension($pageId, $data)
    {
        $data['page_id'] = $pageId;
        return  $this->pageExtensionRepository->create($data);
    }
}