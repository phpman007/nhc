<?php

use Illuminate\Database\Seeder;

class NgoGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ngo_groups')->delete();
        
        \DB::table('ngo_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'groupName' => 'กลุ่มขององค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก',
                'groupName2' => 'ผู้แทนองค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก',
                'created_at' => '2019-06-14 11:41:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'groupName' => 'กลุ่มขององค์กรที่ดำเนินงานด้านอาสาสมัคร งานจิตอาสา หรือการรณรงค์เผยแพร่',
                'groupName2' => 'ผู้แทนองค์กรที่ดำเนินงานด้านอาสาสมัคร งานจิตอาสา หรือการรณรงค์เผยแพร่',
                'created_at' => '2019-06-14 11:41:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'groupName' => 'กลุ่มขององค์กรที่ดำเนินงานด้านการแพทย์และสาธารณสุข',
                'groupName2' => 'ผู้แทนองค์กรที่ดำเนินงานด้านการแพทย์และสาธารณสุข',
                'created_at' => '2019-06-14 11:41:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'groupName' => 'กลุ่มขององค์กรชุมชนที่ดำเนินงานด้านการพัฒนาในพื้นที่ชุมชน',
                'groupName2' => 'ผู้แทนองค์กรชุมชนที่ดำเนินงานด้านการพัฒนาในพื้นที่ชุมชน',
                'created_at' => '2019-06-14 11:41:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'groupName' => 'กลุ่มขององค์กรที่ดำเนินงานด้านการพัฒนาชุมชน สังคม นโยบายสาธารณะ การพิทักษ์สิทธิมนุษยชน การศึกษา ศาสนา ทรัพยากรธรรมชาติและสิ่งแวดล้อม หรืออื่นๆ ในเชิงประเด็น',
                'groupName2' => 'ผู้แทนองค์กรที่ดำเนินงานด้านการพัฒนาชุมชน สังคม นโยบายสาธารณะ การพิทักษ์สิทธิมนุษยชน การศึกษา ศาสนา ',
                'created_at' => '2019-06-14 11:41:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}