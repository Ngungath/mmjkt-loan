<?php

use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
use App\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([

              [   'name'=>'MAKAO MAKUU YA JKT' ,
                  'number'=> 'MMJKT'
              ],
              ['name'=>'BULOMBORA ',
                'number'=>'821KJ'],

                ['name'=>'RWAMKOMA',
                  'number'=>'822KJ'
              ],
              ['name'=>'MSANGE' ,
                'number'=>'823KJ'],
              ['name'=>'KANEBWA',
                'number'=>'824KJ'],
                ['name'=>'MTABILA', 
                'number'=>'825KJ'],

      ['name'=>'MPWAPWA',
      'number'=>'826KJ'],

      ['name'=>'KIBITI',
      'number'=>'830KJ'],
      ['name'=>'MGULANI',
      'number'=>'831KJ'],
      ['name'=>'RUVU',
      'number'=> '832KJ'],
      ['name'=>'OLJORO',
      'number'=>'833KJ'],

      ['name'=>'MAKUTUPORA',
      'number'=> '834KJ'],
      ['name'=>'MGAMBO',
        'number'=>'835KJ'
      ],
      ['name'=>'MBWENI',
      'number'=>'836KJ'],

      ['name'=>'CHITA',
      'number'=>'837KJ'],
      ['name'=>'MARAMBA',
      'number'=>'838KJ'],
      ['name'=>'MAKUYUNI' ,
        'number'=>'839KJ'],
      ['name'=>'MAFINGA',
      'number'=>'841KJ'],
      ['name'=>'MLALE',
      'number'=>'842KJ'],
      ['name'=>'NACHINGWEA',
      'number'=>'843KJ'],
      ['name'=>'ITENDE',
      'number'=>'844KJ'],

      ['name'=>'ITAKA', 
      'number'=>'845KJ'],
      ['name'=>'RUA',
      'number'=>'846KJ'],
      ['name'=>'MILUNDIKWA',
      'number'=>'847KJ'],
      ['name'=>'KIMBIJI',
      'number'=>'CUJKT']

     ]);
    }
}
