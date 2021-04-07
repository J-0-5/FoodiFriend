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
            1 => [2, "1111111", "Helados Buggy", 2, "Se venden todo tipo de helados"],
            2 => [3, "2222222", "Jennos Pizza", 3, "Se venden todo dipo de pizzas"],
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
