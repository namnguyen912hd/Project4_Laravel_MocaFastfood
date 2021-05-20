<?php

namespace App\Exports;

use App\models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductExport implements FromCollection,WithHeadings
{


	public function headings():array
	{
		return [
			'Id',
			'Name',
			'price',
			'quantitysold'
		];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return collect(Product::getProducts());
        //return Product::all();
    }
}
