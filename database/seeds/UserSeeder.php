<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users = [ //id => data
            1 => ["Admin", "", 1, "123456789", 1, "dir1", "admin@foodie.com", "secret"],
            2 => ["comercio1", "", 1, "123456987", 1, "dir2", "comercio1@foodie.com", "secret"],
            3 => ["comercio2", "", 1, "987654321", 1, "dir3", "comercio2@foodie.com", "secret"]
        ];

        foreach ($Users as $id => $user) {
            User::create([
                'name' => $user[0],
                'lastName' => $user[1],
                'docType' => $user[2],
                'docNum' => $user[3],
                'city_id' => $user[4],
                'address' => $user[5],
                'email' => $user[6],
                'password' => Hash::make($user[7]),
            ]);
        }
    }
}
