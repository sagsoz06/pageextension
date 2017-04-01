<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/pageextension'], function (Router $router) {
    $router->bind('pageextension', function ($id) {
        return app('Modules\Pageextension\Repositories\PageextensionRepository')->find($id);
    });
    $router->get('pageextensions', [
        'as' => 'admin.pageextension.pageextension.index',
        'uses' => 'PageextensionController@index',
        'middleware' => 'can:pageextension.pageextensions.index'
    ]);
    $router->get('pageextensions/create', [
        'as' => 'admin.pageextension.pageextension.create',
        'uses' => 'PageextensionController@create',
        'middleware' => 'can:pageextension.pageextensions.create'
    ]);
    $router->post('pageextensions', [
        'as' => 'admin.pageextension.pageextension.store',
        'uses' => 'PageextensionController@store',
        'middleware' => 'can:pageextension.pageextensions.create'
    ]);
    $router->get('pageextensions/{pageextension}/edit', [
        'as' => 'admin.pageextension.pageextension.edit',
        'uses' => 'PageextensionController@edit',
        'middleware' => 'can:pageextension.pageextensions.edit'
    ]);
    $router->put('pageextensions/{pageextension}', [
        'as' => 'admin.pageextension.pageextension.update',
        'uses' => 'PageextensionController@update',
        'middleware' => 'can:pageextension.pageextensions.edit'
    ]);
    $router->delete('pageextensions/{pageextension}', [
        'as' => 'admin.pageextension.pageextension.destroy',
        'uses' => 'PageextensionController@destroy',
        'middleware' => 'can:pageextension.pageextensions.destroy'
    ]);
// append

});
