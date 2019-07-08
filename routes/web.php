<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
      return event(new App\Events\FinishRegister(App\Model\Frontend\Member::find(76), 1))[0]->stream();
      return view('frontend.homepage.index');
});

Route::get('asset/remove/{id}', function($id) {
      Auth::user()->attach->find($id)->update(['status'=>0]);

      return back();
});
Route::get('/login', 'Frontend\AuthController@getLogin');
Route::get('/logout', 'Frontend\AuthController@logout');
Route::post('/login', 'Frontend\AuthController@postLogin');


Route::get('cancel-form', function () {
      try {
            event(new App\Events\CancelRegisterEvent(Auth::user()));

      } catch (\Exception $e) {
      // return redirect('/')->withErrors(['error'=> "ไม่สามารถส่งอีเมลได้ในขณะนี้"]);
      }
      return redirect('/');

});

Route::group([
	'prefix' => 'form-professional',
	'as' =>'form-professional.',
	'namespace' =>'Frontend'], function() {

	Route::get('{step}', 'FormProfessorController@formView');

	Route::post('{step}', 'FormProfessorController@formPost');
});

Route::group([
	'prefix' => 'form-organization',
	'as' =>'form-organization.',
	'namespace' =>'Frontend'], function() {

	Route::get('{step}', 'FormOrganizationController@formView');

	Route::post('{step}', 'FormOrganizationController@formPost');
});
Route::group([
	'prefix' => 'form-ngo-register',
	'as' =>'form-ngo-register.',
	'namespace' =>'Frontend'], function() {

	Route::get('{step}', 'FormNgoRegisterController@formView');

	Route::post('{step}', 'FormNgoRegisterController@formPost');
});


Route::group([
	'prefix' => 'form-ngo',
	'as' =>'form-ngo.',
	'namespace' =>'Frontend'], function() {

	Route::get('{step}', 'FormNgoController@formView');

	Route::post('{step}', 'FormNgoController@formPost');
});
