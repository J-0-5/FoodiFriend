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
            1 => ['Hamburguesa',1,'Una hamburguesa es un sándwich hecho a base de carne molida o de origen vegetal, aglutinada en forma de filete cocinado a la parrilla o a la plancha, aunque también puede freírse u hornearse.'],
            2 => ['Pollo',1,'Disfruta el pollo en variedad de presentaciones'],
            3 => ['Postres',1,'Pueba nuestros mas deliciosos postres'],
            4 => ['Cajita feliz',1,'La Cajita Feliz de McDonald´s es uno de los productos más famosos de nuestra comida rápida. Su fama se debe a que es la favorita de los niños gracias a lo llamativo de su presentación, pero sobre todo por los juguetes que cada cierto periodo de tiempo se van cambiando según las tendencias'],
            5 => ['Bebidas',1,'Acompaña tus pedidos con una buena bebida'],
            6 => ['Pizzas Clasicas',2,'Las Pizzas tradicionales de siempre'],
            7 => ['Pizzas Famosas',2,'Nuevas variedades de pizzas']
        ];

        foreach ($ProductCategories as $id => $productCategories) {
            ProductCategory::create([
                'name' => $productCategories[0],
                'commerce_id' => $productCategories[1],
                'description' => $productCategories[2],
            ]);
        }
    }
}
