<?php

namespace Modules\Pageextension\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pageextension\Entities\Pageextension;
use Modules\Pageextension\Repositories\PageextensionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PageextensionController extends AdminBaseController
{
    /**
     * @var PageextensionRepository
     */
    private $pageextension;

    public function __construct(PageextensionRepository $pageextension)
    {
        parent::__construct();

        $this->pageextension = $pageextension;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$pageextensions = $this->pageextension->all();

        return view('pageextension::admin.pageextensions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pageextension::admin.pageextensions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->pageextension->create($request->all());

        return redirect()->route('admin.pageextension.pageextension.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('pageextension::pageextensions.title.pageextensions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pageextension $pageextension
     * @return Response
     */
    public function edit(Pageextension $pageextension)
    {
        return view('pageextension::admin.pageextensions.edit', compact('pageextension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pageextension $pageextension
     * @param  Request $request
     * @return Response
     */
    public function update(Pageextension $pageextension, Request $request)
    {
        $this->pageextension->update($pageextension, $request->all());

        return redirect()->route('admin.pageextension.pageextension.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pageextension::pageextensions.title.pageextensions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pageextension $pageextension
     * @return Response
     */
    public function destroy(Pageextension $pageextension)
    {
        $this->pageextension->destroy($pageextension);

        return redirect()->route('admin.pageextension.pageextension.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('pageextension::pageextensions.title.pageextensions')]));
    }
}
