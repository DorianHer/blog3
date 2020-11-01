<?php

namespace App\Exports;

use App\Models\Brand;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\FromQuery;

class BrandsExport implements FromCollection
{
    use Exportable;

    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /*public function collection()
    {
        return Brand::all();
    }*/

    /**
     * @return Builder
     */
    public function query()
    {
        //dd($this->id);
        $brand = Brand::query()->find($this->id);
        //$products = $brand->products;
        //dd($brand->products->toArray());
        return $brand->products;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        //dd($this->id);
        $brand = Brand::query()->find($this->id);
        //$products = $brand->products;
        //dd($brand->products->toArray());
        return $brand->products;
    }
}
