<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(InstansiSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(KategoriSeeder::class);
    }
}
