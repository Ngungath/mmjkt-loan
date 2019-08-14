<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Seting;

class SetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Seting::create([
         	'logo'=>asset('/img/jkt.PNG'),
         ]);
    }
}
