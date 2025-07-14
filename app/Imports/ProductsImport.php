<?php

namespace App\Imports;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Product::create([
                'id' => $row[0],
                'brand_id' => $row[1],
                'category_id' => $row[2], 
                'departement' => $row[3],
                'code' => $row[4],
                'name' => $row[5],
                'photo' => $row[6],
                'slug' => $row[7],
                'created_at' => Carbon::now(), // Gunakan Carbon::now() tanpa Carbon prefix
                'updated_at' => Carbon::now(), // Gunakan Carbon::now() tanpa Carbon prefix
            ]);
        }
    }
}
