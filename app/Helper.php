<?php
namespace App;
use DB;

class Helper
{
      public static function getProvices()
      {
            $provinces = DB::table('provinces')
                  ->select('province_code', 'province')
                  ->groupBy('province_code', 'province')
                  ->get();
            return $provinces->pluck('province', 'province_code')->toArray();
      }

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
