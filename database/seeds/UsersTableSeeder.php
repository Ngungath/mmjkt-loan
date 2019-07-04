<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     User::create([

       'name'=>'Ndabehy Majid',
       'email'=>'ndabehy@gmail.com',
       'role_id'=>1,
       'password'=>Hash::make('198900')

     ]);   

    }
}
