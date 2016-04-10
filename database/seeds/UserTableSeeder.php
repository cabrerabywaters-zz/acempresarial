<?php

use Illuminate\Database\Seeder;
use acempresarial\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $supervisor = User::create([           
            'name'    => "Ignacio Cabrera",
            'email'       => "admin@acempresarial.cl",           
            'password'    => Hash::make("123")
        ]);
    }
}
