<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('instansi')->insert([
            'name' => 'RSUD Tarakan',
            'address' => 'jakarta selatan jalan ahmad yani',
            'provinsi' => 'Aceh',
            'jenis' => 'swasta',
            'type' => 'Rumah Sakit Khusus Kelas A',
            'slug' => Str::slug('RSUD Tarakan'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('instansi')->insert([
            'name' => 'RSUD PON',
            'address' => 'Jakarta Pusat',
            'provinsi' => 'DKI Jakarta',
            'jenis' => 'swasta',
            'type' => 'Rumah Sakit Khusus Kelas B',
            'slug' => Str::slug('RSUD PON'),
            'created_at' => Carbon::now(),
        ]);
    }
}
