<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('points')->delete();
        
        \DB::table('points')->insert(array (
            0 => 
            array (
                'id' => 1,
                'point' => 3,
                'created_at' => '2019-06-19 09:10:38',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'point' => 2,
                'created_at' => '2019-06-19 09:10:38',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'point' => 1,
                'created_at' => '2019-06-19 09:10:38',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}