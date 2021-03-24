<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductCategories = [
            'Panaderia y dulces',
            'Carnes y embutidos',
            'Frutas y verduras',
            'Panaderia y dulces',
            'Huevos, Lacteos y café',
            'Zumos y bebidas'
        ];

        foreach ($ProductCategories as $name) {
            ProductCategory::create([
                'name' => $name
            ]);
        }
    }
}
