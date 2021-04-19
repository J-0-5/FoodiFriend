<?php

use App\Commerce;
use Illuminate\Database\Seeder;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Commerces = [ //id => data
            1 => [2, "800.244.387-4", "McDONALD'S", 3, "McDonald's es una franquicia de restaurantes de comida rápida estadounidense con sede en Chicago, Illinois.​ Sus principales productos son las hamburguesas, las patatas fritas, los menús para el desayuno y los refrescos."],
            2 => [3, " 900.934.851-4", "DOMINO'S", 3, "Domino's Pizza es una Cadena de pizzerías con reparto a domicilio que sirve una gran variedad de pizzas, pollo y entrantes."],
        ];

        foreach ($Commerces as $id => $commerce) {
            Commerce::create([
                'user_id' => $commerce[0],
                'nit' => $commerce[1],
                'name' => $commerce[2],
                'type' => $commerce[3],
                'description' => $commerce[4]
            ]);
        }
    }
}
