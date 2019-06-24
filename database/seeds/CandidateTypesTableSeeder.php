<?php

use Illuminate\Database\Seeder;

class CandidateTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('candidate_types')->delete();
        
        \DB::table('candidate_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'candidateType' => 'สมัครเป็นตัวแทน',
                'created_at' => '2019-06-14 11:52:42',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'candidateType' => 'สมัครเพื่อลงคะแนนเท่านั้น',
                'created_at' => '2019-06-14 11:52:42',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}