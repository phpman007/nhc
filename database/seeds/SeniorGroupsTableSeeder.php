<?php

use Illuminate\Database\Seeder;

class SeniorGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('senior_groups')->delete();
        
        \DB::table('senior_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'groupName' => 'กลุ่มบริหาร นโยบายสาธารณะ รัฐศาสตร์ นิติศาสตร์',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'groupName' => 'กลุ่มธุรกิจ บริหารธุรกิจ เศรษฐศาสตร์',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'groupName' => 'กลุ่มการศึกษา การจัดการความรู้',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'groupName' => 'กลุ่มการสื่อสารมวลชน เทคโนโลยีสารสนเทศ',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'groupName' => 'กลุ่มพัฒนาประชาชนกลุ่มเป้าหมายโดยเฉพาะ',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'groupName' => 'กลุ่มการพัฒนาสังคมและชุมชนท้องถิ่น',
                'created_at' => '2019-06-14 11:32:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}