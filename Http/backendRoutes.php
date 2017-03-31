<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/pageextension'], function (Router $router) {
    $router->bind('pageextension', function ($id) {
        return app('Modules\PageExtension\Repositories\PageExtensionRepository')->find($id);
    });
    $router->get('pageextensions', [
        'as' => 'admin.pageextension.pageextension.index',
        'uses' => 'PageExtensionController@index',
        'middleware' => 'can:pageextension.pageextensions.index'
    ]);
    $router->get('pageextensions/create', [
        'as' => 'admin.pageextension.pageextension.create',
        'uses' => 'PageExtensionController@create',
        'middleware' => 'can:pageextension.pageextensions.create'
    ]);
    $router->post('pageextensions', [
        'as' => 'admin.pageextension.pageextension.store',
        'uses' => 'PageExtensionController@store',
        'middleware' => 'can:pageextension.pageextensions.create'
    ]);
    $router->get('pageextensions/{pageextension}/edit', [
        'as' => 'admin.pageextension.pageextension.edit',
        'uses' => 'PageExtensionController@edit',
        'middleware' => 'can:pageextension.pageextensions.edit'
    ]);
    $router->put('pageextensions/{pageextension}', [
        'as' => 'admin.pageextension.pageextension.update',
        'uses' => 'PageExtensionController@update',
        'middleware' => 'can:pageextension.pageextensions.edit'
    ]);
    $router->delete('pageextensions/{pageextension}', [
        'as' => 'admin.pageextension.pageextension.destroy',
        'uses' => 'PageExtensionController@destroy',
        'middleware' => 'can:pageextension.pageextensions.destroy'
    ]);
// append

});
