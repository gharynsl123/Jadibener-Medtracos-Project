<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Kompor',
            'departement' => 'Hospital Kitchen',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Meja Kerja',
            'departement' => 'Hospital Kitchen',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Sinar UV',
            'departement' => 'CSSD',
            'created_at' => Carbon::now(),
        ]);
    }
}
