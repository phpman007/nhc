<?php
namespace App;
use DB;
use Carbon\Carbon;

class Helper
{
      // แปลงวันที่จาก Database เป็น ไทย
      // return date format thai
      public static function dateToThai($date)
      {
            return Carbon::parse($date)->addYears(543)->format("d/m/Y");
      }

      // ดึงข้อมูลจังหวัดส่งค่าเป็น Array
      // Return array
      public static function getProvices()
      {
            $provinces = DB::table('provinces')
                  ->select('province_code', 'province')
                  ->groupBy('province_code', 'province')
                  ->get();
            return $provinces->pluck('province', 'province_code')->toArray();
      }


      // อัพโหลดไฟล์
      // return array file upload
      public static function uploadFile($file, $destination = "other") {

            if($file->isValid()) {
                  $type       = $file->getClientOriginalExtension();
                  $oldName    = $file->getClientOriginalName();
                  $size       = $file->getSize();
                  $filename   = now()->format('YmdHis').".".$type;

                  $file->move('uploads/'.$destination, $filename);

                  return ['filename'=>$filename, 'path'=> 'uploads/'. $destination.'/'. $filename, 'type' => $type, 'size' => $size, 'oldName' => $oldName];
            }
            return false;
      }


}



 ?>
