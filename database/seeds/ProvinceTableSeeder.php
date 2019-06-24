<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('province')->delete();
        
        \DB::table('province')->insert(array (
            0 => 
            array (
                'id' => 1,
                'provinceId' => 10,
                'province' => 'กรุงเทพมหานคร',
            ),
            1 => 
            array (
                'id' => 2,
                'provinceId' => 11,
                'province' => 'สมุทรปราการ',
            ),
            2 => 
            array (
                'id' => 3,
                'provinceId' => 12,
                'province' => 'นนทบุรี',
            ),
            3 => 
            array (
                'id' => 4,
                'provinceId' => 13,
                'province' => 'ปทุมธานี',
            ),
            4 => 
            array (
                'id' => 5,
                'provinceId' => 14,
                'province' => 'พระนครศรีอยุธยา',
            ),
            5 => 
            array (
                'id' => 6,
                'provinceId' => 15,
                'province' => 'อ่างทอง',
            ),
            6 => 
            array (
                'id' => 7,
                'provinceId' => 16,
                'province' => 'ลพบุรี',
            ),
            7 => 
            array (
                'id' => 8,
                'provinceId' => 17,
                'province' => 'สิงห์บุรี',
            ),
            8 => 
            array (
                'id' => 9,
                'provinceId' => 18,
                'province' => 'ชัยนาท',
            ),
            9 => 
            array (
                'id' => 10,
                'provinceId' => 19,
                'province' => 'สระบุรี',
            ),
            10 => 
            array (
                'id' => 11,
                'provinceId' => 20,
                'province' => 'ชลบุรี',
            ),
            11 => 
            array (
                'id' => 12,
                'provinceId' => 21,
                'province' => 'ระยอง',
            ),
            12 => 
            array (
                'id' => 13,
                'provinceId' => 22,
                'province' => 'จันทบุรี',
            ),
            13 => 
            array (
                'id' => 14,
                'provinceId' => 23,
                'province' => 'ตราด',
            ),
            14 => 
            array (
                'id' => 15,
                'provinceId' => 24,
                'province' => 'ฉะเชิงเทรา',
            ),
            15 => 
            array (
                'id' => 16,
                'provinceId' => 25,
                'province' => 'ปราจีนบุรี',
            ),
            16 => 
            array (
                'id' => 17,
                'provinceId' => 26,
                'province' => 'นครนายก',
            ),
            17 => 
            array (
                'id' => 18,
                'provinceId' => 27,
                'province' => 'สระแก้ว',
            ),
            18 => 
            array (
                'id' => 19,
                'provinceId' => 30,
                'province' => 'นครราชสีมา',
            ),
            19 => 
            array (
                'id' => 20,
                'provinceId' => 31,
                'province' => 'บุรีรัมย์',
            ),
            20 => 
            array (
                'id' => 21,
                'provinceId' => 32,
                'province' => 'สุรินทร์',
            ),
            21 => 
            array (
                'id' => 22,
                'provinceId' => 33,
                'province' => 'ศรีสะเกษ',
            ),
            22 => 
            array (
                'id' => 23,
                'provinceId' => 34,
                'province' => 'อุบลราชธานี',
            ),
            23 => 
            array (
                'id' => 24,
                'provinceId' => 35,
                'province' => 'ยโสธร',
            ),
            24 => 
            array (
                'id' => 25,
                'provinceId' => 36,
                'province' => 'ชัยภูมิ',
            ),
            25 => 
            array (
                'id' => 26,
                'provinceId' => 37,
                'province' => 'อำนาจเจริญ',
            ),
            26 => 
            array (
                'id' => 27,
                'provinceId' => 39,
                'province' => 'หนองบัวลำภู',
            ),
            27 => 
            array (
                'id' => 28,
                'provinceId' => 40,
                'province' => 'ขอนแก่น',
            ),
            28 => 
            array (
                'id' => 29,
                'provinceId' => 41,
                'province' => 'อุดรธานี',
            ),
            29 => 
            array (
                'id' => 30,
                'provinceId' => 42,
                'province' => 'เลย',
            ),
            30 => 
            array (
                'id' => 31,
                'provinceId' => 43,
                'province' => 'หนองคาย',
            ),
            31 => 
            array (
                'id' => 32,
                'provinceId' => 44,
                'province' => 'มหาสารคาม',
            ),
            32 => 
            array (
                'id' => 33,
                'provinceId' => 45,
                'province' => 'ร้อยเอ็ด',
            ),
            33 => 
            array (
                'id' => 34,
                'provinceId' => 46,
                'province' => 'กาฬสินธุ์',
            ),
            34 => 
            array (
                'id' => 35,
                'provinceId' => 47,
                'province' => 'สกลนคร',
            ),
            35 => 
            array (
                'id' => 36,
                'provinceId' => 48,
                'province' => 'นครพนม',
            ),
            36 => 
            array (
                'id' => 37,
                'provinceId' => 49,
                'province' => 'มุกดาหาร',
            ),
            37 => 
            array (
                'id' => 38,
                'provinceId' => 50,
                'province' => 'เชียงใหม่',
            ),
            38 => 
            array (
                'id' => 39,
                'provinceId' => 51,
                'province' => 'ลำพูน',
            ),
            39 => 
            array (
                'id' => 40,
                'provinceId' => 52,
                'province' => 'ลำปาง',
            ),
            40 => 
            array (
                'id' => 41,
                'provinceId' => 53,
                'province' => 'อุตรดิตถ์',
            ),
            41 => 
            array (
                'id' => 42,
                'provinceId' => 54,
                'province' => 'แพร่',
            ),
            42 => 
            array (
                'id' => 43,
                'provinceId' => 55,
                'province' => 'น่าน',
            ),
            43 => 
            array (
                'id' => 44,
                'provinceId' => 56,
                'province' => 'พะเยา',
            ),
            44 => 
            array (
                'id' => 45,
                'provinceId' => 57,
                'province' => 'เชียงราย',
            ),
            45 => 
            array (
                'id' => 46,
                'provinceId' => 58,
                'province' => 'แม่ฮ่องสอน',
            ),
            46 => 
            array (
                'id' => 47,
                'provinceId' => 60,
                'province' => 'นครสวรรค์',
            ),
            47 => 
            array (
                'id' => 48,
                'provinceId' => 61,
                'province' => 'อุทัยธานี',
            ),
            48 => 
            array (
                'id' => 49,
                'provinceId' => 62,
                'province' => 'กำแพงเพชร',
            ),
            49 => 
            array (
                'id' => 50,
                'provinceId' => 63,
                'province' => 'ตาก',
            ),
            50 => 
            array (
                'id' => 51,
                'provinceId' => 64,
                'province' => 'สุโขทัย',
            ),
            51 => 
            array (
                'id' => 52,
                'provinceId' => 65,
                'province' => 'พิษณุโลก',
            ),
            52 => 
            array (
                'id' => 53,
                'provinceId' => 66,
                'province' => 'พิจิตร',
            ),
            53 => 
            array (
                'id' => 54,
                'provinceId' => 67,
                'province' => 'เพชรบูรณ์',
            ),
            54 => 
            array (
                'id' => 55,
                'provinceId' => 70,
                'province' => 'ราชบุรี',
            ),
            55 => 
            array (
                'id' => 56,
                'provinceId' => 71,
                'province' => 'กาญจนบุรี',
            ),
            56 => 
            array (
                'id' => 57,
                'provinceId' => 72,
                'province' => 'สุพรรณบุรี',
            ),
            57 => 
            array (
                'id' => 58,
                'provinceId' => 73,
                'province' => 'นครปฐม',
            ),
            58 => 
            array (
                'id' => 59,
                'provinceId' => 74,
                'province' => 'สมุทรสาคร',
            ),
            59 => 
            array (
                'id' => 60,
                'provinceId' => 75,
                'province' => 'สมุทรสงคราม',
            ),
            60 => 
            array (
                'id' => 61,
                'provinceId' => 76,
                'province' => 'เพชรบุรี',
            ),
            61 => 
            array (
                'id' => 62,
                'provinceId' => 77,
                'province' => 'ประจวบคีรีขันธ์',
            ),
            62 => 
            array (
                'id' => 63,
                'provinceId' => 80,
                'province' => 'นครศรีธรรมราช',
            ),
            63 => 
            array (
                'id' => 64,
                'provinceId' => 81,
                'province' => 'กระบี่',
            ),
            64 => 
            array (
                'id' => 65,
                'provinceId' => 82,
                'province' => 'พังงา',
            ),
            65 => 
            array (
                'id' => 66,
                'provinceId' => 83,
                'province' => 'ภูเก็ต',
            ),
            66 => 
            array (
                'id' => 67,
                'provinceId' => 84,
                'province' => 'สุราษฎร์ธานี',
            ),
            67 => 
            array (
                'id' => 68,
                'provinceId' => 85,
                'province' => 'ระนอง',
            ),
            68 => 
            array (
                'id' => 69,
                'provinceId' => 86,
                'province' => 'ชุมพร',
            ),
            69 => 
            array (
                'id' => 70,
                'provinceId' => 90,
                'province' => 'สงขลา',
            ),
            70 => 
            array (
                'id' => 71,
                'provinceId' => 91,
                'province' => 'สตูล',
            ),
            71 => 
            array (
                'id' => 72,
                'provinceId' => 92,
                'province' => 'ตรัง',
            ),
            72 => 
            array (
                'id' => 73,
                'provinceId' => 93,
                'province' => 'พัทลุง',
            ),
            73 => 
            array (
                'id' => 74,
                'provinceId' => 94,
                'province' => 'ปัตตานี',
            ),
            74 => 
            array (
                'id' => 75,
                'provinceId' => 95,
                'province' => 'ยะลา',
            ),
            75 => 
            array (
                'id' => 76,
                'provinceId' => 96,
                'province' => 'นราธิวาส',
            ),
            76 => 
            array (
                'id' => 77,
                'provinceId' => 97,
                'province' => 'บึงกาฬ',
            ),
        ));
        
        
    }
}