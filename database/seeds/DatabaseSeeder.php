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
        $this->call(PlaceSeeder::class);
        $this->call(ParameterValueSeeder::class);
        $this->call(CommerceTypeSeeder::class);
        //$this->call(ProductCategorySeeder::class);
    }
}
