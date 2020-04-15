<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setColumns([
          [
            'name' => 'nom',
            'label' => 'Nom ',
            'type' => 'text'
          ],
          [
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id', 
            'entity' => 'category', 
            'attribute' => 'name', 
            'model' => "App\Models\Category",
          ],
          [
            'name' => 'prix',
            'label' => 'Prix  ',
            'type' => 'number'
          ],
          [
            'name' => 'remise',
            'label' => 'Remise  ',
            'type' => 'number'
          ],
          [
            'label' => "Image",
            'name' => "img",
            'type' => 'image',
            'upload' => true,
            //'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
            'height' => '80px',
            'width' => '80px'
          ],
          [
            'name' => 'date_debut',
            'label' => 'Date debut  ',
            'type' => 'date'
          ],
          [
            'name' => 'date_fin',
            'label' => 'Date fin  ',
            'type' => 'date'
          ]
        ]);


    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

   
        $this->crud->addField([
            'name' => 'nom',
            'label' => 'Nom ',
            'type' => 'text'
          ]);
          $this->crud->addField([  
 
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id', 
            'entity' => 'category', 
            'attribute' => 'name', 
            'model' => "App\Models\Category",
          ]);
          $this->crud->addField([
            'name' => 'prix',
            'label' => 'Prix  ',
            'type' => 'number'
          ]);
        $this->crud->addField([
            'name' => 'remise',
            'label' => 'Remise  ',
            'type' => 'number'
          ]);
          $this->crud->addField([ 
            'label' => "Image",
            'name' => "img",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, 
        ]);
        $this->crud->addField([
            'name' => 'date_debut',
            'label' => 'Date debut  ',
            'type' => 'date'
          ]);
        $this->crud->addField([
            'name' => 'date_fin',
            'label' => 'Date fin  ',
            'type' => 'date'
          ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
