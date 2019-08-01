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
       'user_type'=>'admin',
       'password'=>Hash::make('198900')

     ]);   

    }
}
