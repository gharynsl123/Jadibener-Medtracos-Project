<?php

namespace App\Imports;

use App\Instansi;
use Carbon\Carbon; // Hanya impor Carbon saja
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class InstansiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Instansi::create([
                'id' => $row[0],
                'name' => $row[1], 
                'slug' => $row[2],
                'provinsi' => $row[3],
                'address' => $row[4],
                'type' => $row[5],
                'jenis' => $row[6],
                'photo' => $row[7],
                'created_at' => Carbon::now(), // Gunakan Carbon::now() tanpa Carbon prefix
                'updated_at' => Carbon::now(), // Gunakan Carbon::now() tanpa Carbon prefix
            ]);
        }
    }
}
