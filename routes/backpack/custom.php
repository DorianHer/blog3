<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('brand', 'BrandCrudController');
    Route::get('admin/export', function ($id){
        return 'hola';
    });
    //Route::get('products/export/{id}', 'BrandCrudController@export');
}); // this should be the absolute last line of this file
