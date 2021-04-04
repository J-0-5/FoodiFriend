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
            1 => [2, "987456321", 'fastfood', 1, "comercio de comidas rapidas"]
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
