<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('groups')->delete();
        
        \DB::table('groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'groupName' => 'ผู้ทรงคุณวุฒิ',
                'created_at' => '2019-06-14 11:34:36',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'groupName' => 'ผู้แทนองค์กรส่วนท้องถิ่น',
                'created_at' => '2019-06-14 11:34:36',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'groupName' => 'ผู้แทนองค์กรภาคเอกชน',
                'created_at' => '2019-06-14 11:34:36',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}