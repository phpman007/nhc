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
	$yearSelect = \Carbon\Carbon::createFromFormat('d/m/Y',$request->date)->addYears('-543')->format('Y');
	$yearNow = now()->format('Y');

	return ['old' => $yearNow - $yearSelect];
});

Route::get('get_address', function(Request $request){
      return [\DB::table('provinces')->where('zipcode', $request->zipcode)->first()];
});
