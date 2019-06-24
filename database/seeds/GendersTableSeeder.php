<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genders')->delete();
        
        \DB::table('genders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'gender' => 'ชาย',
                'created_at' => '2019-06-14 11:26:31',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'gender' => 'หญิง',
                'created_at' => '2019-06-14 11:26:31',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'gender' => 'นักบวช/สมณะ',
                'created_at' => '2019-06-14 11:27:30',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}