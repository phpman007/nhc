<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 'รอการตรวจสอบคุณสมบัติ',
                'created_at' => '2019-06-14 11:46:56',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 'อยู่ระหว่างการตรวจสอบ',
                'created_at' => '2019-06-14 11:46:56',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 'ผ่าน',
                'created_at' => '2019-06-14 11:46:56',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'status' => 'ไม่ผ่าน',
                'created_at' => '2019-06-14 11:46:56',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}