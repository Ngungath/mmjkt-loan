<?php

use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
use App\Lender;
class LendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('lenders')->insert([
         ["name"=>"CRDB"],
         ["name"=>"NMB"],
         ["name"=>"PBZ"]
        ]);
    }
}
