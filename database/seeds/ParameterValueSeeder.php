<?php

use App\ParameterValue;
use Illuminate\Database\Seeder;

class ParameterValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ParameterValue = [
            1 => ["Cédula de ciudadanía", "Cédula de extranjería", "Pasaporte"], //docType => [id => values]
            2 => ["Efectivo", "Credito", "Paypal"] //docType => [id => values]
        ];
        foreach ($ParameterValue as $id => $values) {
            foreach ($values as $value) {
                ParameterValue::create([
                    'typeParameter' => $id,
                    'value' => $value
                ]);
            }
        }
    }
}
