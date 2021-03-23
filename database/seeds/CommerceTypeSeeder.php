<?php

use App\CommerceType;
use Illuminate\Database\Seeder;

class CommerceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CommerceType = [
            "Comida rapida", "Heladeria", "Restaurante"
        ];


        foreach ($CommerceType as $name) {
            CommerceType::create([
                'name' => $name
            ]);
        }
    }
}
