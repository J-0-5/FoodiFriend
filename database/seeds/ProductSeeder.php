<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Products = [
            1 => ['Hamburguesa',1,'Una hamburguesa es un sándwich hecho a base de carne molida o de origen vegetal, aglutinada en forma de filete cocinado a la parrilla o a la plancha, aunque también puede freírse u hornearse.'],
            2 => ['Pollo',1,'Disfruta el pollo en variedad de presentaciones'],
            3 => ['Postres',1,'Pueba nuestros mas deliciosos postres'],
            4 => ['Cajita feliz',1,'La Cajita Feliz de McDonald´s es uno de los productos más famosos de nuestra comida rápida. Su fama se debe a que es la favorita de los niños gracias a lo llamativo de su presentación, pero sobre todo por los juguetes que cada cierto periodo de tiempo se van cambiando según las tendencias'],
            5 => ['Bebidas',1,'Acompaña tus pedidos con una buena bebida'],
            6 => ['Pizza Italiana',2,'Pizza de italia'],
            7 => ['ChoriPizza',2,'Pizza con chorizo']
        ];

        foreach ($Products as $id => $Product) {
            Product::create([
                'name' => $Product[0],
                'commerce_id' => $Product[1],
                'description' => $Product[2],
            ]);
        }
    }
}