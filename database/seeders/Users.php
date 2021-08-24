<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->idrol = '100';
        $user->user = 'Sistemas';  
        $user->idfuerza = 1;  
        $user->papeleta = '99999999';  //es el admin
        // $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
 
    }
}
