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
            1 => ['Chococono',1,'Helado cono sabor a chocolate',1],
            2 => ['Bananasplit',1,'Helado con banana',1],
            3 => ['Pizza Italiana',2,'Pizza de italia',1],
            4 => ['ChoriPizza',2,'Pizza con chorizo',1]
        ];

        foreach ($ProductCategories as $id => $productCategories) {
            ProductCategory::create([
                'name' => $productCategories[0],
                'commerce_id' => $productCategories[1],
                'description' => $productCategories[2],
                'state' => $productCategories[3],
            ]);
        }
    }
}
