<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'brands';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function exportProducts($crud = false)
    {
        //return '<a class="btn btn-xs btn-default" target="_blank" href="export/?id='.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i>Export Products</a>';
        //return '<a class="btn btn-xs btn-default" target="_blank" href="export" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i>Export Products</a>';
        return '<a class="btn btn-xs btn-default" target="_blank" href="export/'.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i>Export Products</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
