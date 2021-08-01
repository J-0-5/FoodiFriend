<?php

namespace App\Helpers;

use App\CommerceType;
use App\Department;
use App\ParameterValue;

class Helpers
{
    public static function dataCookie($item = null)
    {
        try {

            $data = array(
                'departments' => Department::get(),
                'docType' => ParameterValue::where('typeParameter', 1)->get(),
                'commerceType' => CommerceType::where('state', 1)->get(),
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
