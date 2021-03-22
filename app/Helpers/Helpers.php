<?php

namespace App\Helpers;

use App\Department;
use App\ParameterValue;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class Helpers
{
    public static function dataCookie($item = null)
    {
        try {
            // $departaments = Departament::get();

            $data = array(
                'departments' => Department::get(),
                'typeDoc' => ParameterValue::where('typeParameter', 1)->get(),
            );

            // $result = json_decode(json_encode($data), true);

            if ($item !== null) {
                $response = $data[$item];
            } else {
                $response = $data;
            }
            // dd($response);

            return $response;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
