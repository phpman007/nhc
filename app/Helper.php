<?php
namespace App;
use DB;
use Carbon\Carbon;
use Image;
class Helper
{
      // แปลงวันที่จาก Database เป็น ไทย
      // return date format thai
      public static function dateToThai($date)
      {
            return Carbon::parse($date)->addYears(543)->format("d/m/Y");
      }

      public static function monthThai($month)
      {
           $thaimonth = array('',"มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
           return $thaimonth[(int)$month];
      }

      public static function monthThai1($month)
      {
           $thaimonth = array('',"ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
           return $thaimonth[(int)$month];
      }

      //
      public static function dateMonthThai($date)
      {
           $thaimonth = array('', "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

           $date = explode('/', $date);

           return $date[0] ." ". $thaimonth[(int)$date[1]] ." ". $date[2];
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
                  $filename   = str_random(5)."-".now()->format('YmdHis').".".$type;

                  if (!file_exists(public_path('uploads/'.$destination))) {
                        mkdir('uploads/'.$destination, 755, true);
                    }

                  if($type == "jpg") {
                        $img = Image::make($file->getPathname());
                          // resize the image to a width of 300 and constrain aspect ratio (auto height)
                          if($img->width()  > 1024){
                              $img->resize(1024, null, function ($constraint) {
                                  $constraint->aspectRatio();
                              });
                        }

                        $img->save(public_path('uploads/'.$destination.'/'. $filename));
                  } else {

                        $file->move('uploads/'.$destination, $filename);
                  }

                  return ['filename'=>$filename, 'path'=> 'uploads/'. $destination.'/'. $filename, 'type' => $type, 'size' => $size, 'oldName' => $oldName];
            }
            return false;
      }


}



 ?>
