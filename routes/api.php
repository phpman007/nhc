<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('checkYear', function(Request $request){
	$yearSelect = \Carbon\Carbon::createFromFormat('d/m/Y',$request->date)->addYears('-543');
	$yearNow = \Carbon\Carbon::now()->diffInYears($yearSelect);

     $datetime1 = new DateTime($yearSelect);
     $datetime2 = new DateTime(now());
     $interval = $datetime1->diff($datetime2);

	return ['olds' => $yearNow, 'old'=> $interval->format('%y ปี %m เดือน และ %d วัน')];
});

Route::get('get_address', function(Request $request){
      return [\DB::table('provinces')->where('zipcode', $request->zipcode)->first()];
});

Route::get('getDistrict', function(Request $request) {
      $s = \DB::table('provinces')
      ->where('province_code', $request->provinceId)
      ->select('amphoe', 'amphoe_code')
      ->groupBy('amphoe', 'amphoe_code')
      ->get()
      ->pluck('amphoe', 'amphoe_code');

      $result = array();

      foreach ($s as $key => $value) {
            $result[] = ['id' =>$key, 'text' => $value];
      }
      return $result;
});

Route::get('getSubDistrict', function(Request $request) {
      $s = \DB::table('provinces')
      ->where('amphoe_code', $request->districtId)
      ->select('district', 'district_code')
      ->groupBy('district', 'district_code')
      ->get()
      ->pluck('district', 'district_code');

      $result = array();

      foreach ($s as $key => $value) {
            $result[] = ['id' =>$key, 'text' => $value];
      }
      return $result;
});
