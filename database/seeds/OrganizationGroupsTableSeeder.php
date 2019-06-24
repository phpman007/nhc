<?php

use Illuminate\Database\Seeder;

class OrganizationGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organization_groups')->delete();
        
        \DB::table('organization_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'groupName' => 'ผู้แทนนายกองค์การบริหารส่วนจังหวัด',
                'created_at' => '2019-06-14 11:44:23',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'groupName' => 'ผู้แทนนายกเทศมนตรี',
                'created_at' => '2019-06-14 11:44:23',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'groupName' => 'ผู้แทนนายกองค์การบริหารส่วนตำบล',
                'created_at' => '2019-06-14 11:44:23',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}