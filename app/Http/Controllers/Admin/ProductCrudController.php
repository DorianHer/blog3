<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
        $this->crud->allowAccess('show');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        // Columns listar vista
        $this->crud->addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Nombre']);
        $this->crud->addColumn(['name' => 'price', 'type' => 'text', 'label' => 'Precio']);
        $this->crud->addColumn(['name' => 'brand_id', 'type' => 'select2', 'label' => 'Marca', 'entity' => 'brand', 'attribute' => 'name', 'model' => "App\Models\Brand"]);
        $this->crud->addColumn(['name' => 'profile_image', 'type' => 'image', 'label' => 'Profile image', 'prefix' => 'uploads/images/',
            // optional width/height if 25px is not ok with you
            // 'height' => '30px',
            // 'width' => '30px',
            ]);

        //Fields crear y atualizar vista
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField(['name' => 'price', 'type' => 'text', 'label' => 'Price']);
        $this->crud->addField(['name' => 'brand_id', 'type' => 'select2', 'label' => 'Marca', 'entity' => 'brand', 'attribute' => 'name', 'model' => "App\Models\Brand"]);
        $this->crud->addField([ // image
            'label' => "Profile Image",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

        // add asterisk for fields that are required in ProductRequest
        //$this->crud->setRequiredFields(StoreRequest::class, 'create');
        //$this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
