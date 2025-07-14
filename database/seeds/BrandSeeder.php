<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Robot Coupe',
            'departement' => 'Hospital Kitchen',
            'created_at' => Carbon::now(),
        ]);
        DB::table('brands')->insert([
            'name' => 'Medhigen',
            'departement' => 'Hospital Kitchen',
            'created_at' => Carbon::now(),
        ]);
        DB::table('brands')->insert([
            'name' => 'Exhauset',
            'departement' => 'CSSD',
            'created_at' => Carbon::now(),
        ]);
    }
}
