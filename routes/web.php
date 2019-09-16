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
Route::get('flip/test', function() {
	dd(1);
});

Route::get('/gen-word/{id}', function($id) {
	// dd(1);
	// return view('wordHtml.c1');
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=".sprintf('nhc-NHO-REG-%03d-%02d.doc', $id, now()->format('d')));
	$member = App\Model\Frontend\Member::find($id);
	$detail = $member->detail;
	return view('pdf.wordtohtml', compact('member', 'detail'));
});
Route::get('/gen-word/{id}.doc', function($id) {
	// dd(1);
	// return view('wordHtml.c1');
	// header("Content-type: application/vnd.ms-word");
	// header("Content-Disposition: attachment;Filename=".sprintf('nhc-NHO-REG-%03d-%02d.doc', $id, now()->format('d')));
	$member = App\Model\Frontend\Member::find($id);
	$detail = $member->detail;
	return view('pdf.wordtohtml', compact('member', 'detail'));
});
Route::get('/test-time', function() {
	if(now() >= "2019-08-30 16:00:00") {
		dd('end');
	}
});
Route::get('/resend-1/send', function() {

	$member = App\Model\Frontend\Member::where(function($q) {
		$q = $q->where('status_accept', 1);
		$q = $q->orWhereNotNull('confirmed_at');
	})->whereHas('detail', function($q) {
		$q = $q->whereNotNull('docId');
	})->with('detail')->get();



	foreach ($member as $key => $value) {

		try {
			Mail::to($value->email)->send(new App\Mail\ResendMailNgo($value));
		} catch (\Exception $e) {
			dump($value->email);
		}

	}

});

Route::get('/backend/pdf/{id}', function($id) {
	$genProfessional = new App\Http\Controllers\Frontend\FormProfessorController();
	$genNgo = new App\Http\Controllers\Frontend\FormNgoController();

	$member =  App\Model\Frontend\Member::find($id);
	if($member->groupId == 1) {
		Auth::logout();
		Auth::login($member);
		$genProfessional->genOnly($req = new Illuminate\Http\Request);
		$path = (asset('pdf/professional-merge/'.sprintf('nhc-PRO-%03d-%02d-doc3',Auth::user()->id, now()->format('d')). ".pdf"));

	} else {
		Auth::logout();
		Auth::login($member);
		$genNgo->genOnly($req = new Illuminate\Http\Request);
		$path = (asset('pdf/ngo-merge/'.sprintf('nhc-NGO-%03d-%02d-doc3',Auth::user()->id, now()->format('d')). ".pdf"));
	}
	return redirect($path);
});


// Route::get('genpdf' , function() {
// 	set_time_limit(0);
// 	$genProfessional = new App\Http\Controllers\Frontend\FormProfessorController();
// 	$genNgo = new App\Http\Controllers\Frontend\FormNgoController();
// 	$genNgoRegister = new App\Http\Controllers\Frontend\FormNgoRegisterController();
// 	$member = App\Model\Frontend\Member::where('status_accept', 1)->with('detail')->get();
// 	foreach ($member as $key => $value) {
// 		dump($value->id);
// 		if($value->groupId == 1) {
// 			Auth::logout();
// 			Auth::login($value);
// 			try {
// 				$genProfessional->stepSevent($req = new Illuminate\Http\Request);
// 				dump(asset('pdf/professional-merge/'.sprintf('nhc-PRO-%03d-%02d',Auth::user()->id, now()->format('d')). ".pdf"));
//
// 			} catch (\Exception $e) {
// 				dump($value->id);
// 			}
//
//
// 		} else {
// 			Auth::logout();
// 			Auth::login($value);
// 			try {
// 				$genNgoRegister->stepFive($req = new Illuminate\Http\Request);
// 				$genNgo->stepSix($req = new Illuminate\Http\Request);
// 				dump(asset('pdf/ngo-merge/'.sprintf('nhc-NGO-%03d-%02d',Auth::user()->id, now()->format('d')). ".pdf"));
// 			} catch (\Exception $e) {
// 				dump($value->id);
// 			}
// 		}
// 	}
// });
//
// Route::get('/new-genpdf', function() {
//      set_time_limit(0);
// 	$genProfessional = new App\Http\Controllers\Frontend\FormProfessorController();
// 	$genNgo = new App\Http\Controllers\Frontend\FormNgoController();
// 	$genNgoRegister = new App\Http\Controllers\Frontend\FormNgoRegisterController();
// 	$member = App\Model\Frontend\Member::where(function($q) {
//           $q = $q->where('status_accept', 1);
//           $q = $q->orWhereNotNull('confirmed_at');
//      })->whereHas('detail', function($q) {
//           $q = $q->whereNotNull('docId');
//      })->with('detail')->get();
//      // dd($member);
// 	foreach ($member as $key => $value) {
//
//           dump($key);
// 		if($value->groupId == 1) {
// 			Auth::logout();
// 			Auth::login($value);
// 			try {
// 				$genProfessional->genOnly();
// 				dump(asset('pdf/professional-merge/'.sprintf('nhc-PRO-%03d-%02d',Auth::user()->id, now()->format('d')). ".pdf"));
//
// 			} catch (\Exception $e) {
// 				dump($value->id);
// 			}
//
//
// 		} else {
// 			Auth::logout();
// 			Auth::login($value);
// 			try {
// 				// $genNgoRegister->stepFive($req = new Illuminate\Http\Request);
// 				$genNgo->genOnly();
// 				dump(asset('pdf/ngo-merge/'.sprintf('nhc-NGO-%03d-%02d',Auth::user()->id, now()->format('d')). ".pdf"));
// 			} catch (\Exception $e) {
// 				dump($value->id);
// 			}
// 		}
// 	}
// });

Route::get('/', function () {
	App\Model\Frontend\Log::create(['ipAddress'=>$_SERVER["REMOTE_ADDR"], 'action'=>"visitor", 'dt'=>date("Y-m-d H:i:s")]);
	return view('frontend.homepage.index');
});
Route::get('/pdf/1', function () {
	return event(new App\Events\FinishRegister(App\Model\Frontend\Member::find(76), 1))[0]->stream();
});
Route::get('/pdf/2', function () {
	return $pdf = PDF::loadView('pdf.pdf2')->stream();
});
Route::get('/pdf/3', function () {
	return $pdf = PDF::loadView('pdf.pdf3')->stream();
});
Route::get('/pdf/4', function () {
	return $pdf = PDF::loadView('pdf.pdf4')->stream();
});

Route::get('/pdf/5', function () {
	return $pdf = PDF::loadView('pdf.pdf5')->stream();
});

Route::get('asset/remove/{id}', function($id) {
	// if( Session::has('attachRemove') ) {
	// 	$attachRemove = Session::get('attachRemove');
	// } else {
	// 	$attachRemove = array();
	// }
	// if( !in_array($id, $attachRemove) ) {
	// 	$attachRemove[] = $id;
	// }
	//
	//
	// Session::put('attachRemove', $attachRemove);
	Auth::user()->attach->find($id)->update(['status'=>0]);

	return back();
});

Route::get('/listannounce', function () {
	return view('frontend.mock.listannounce');
});

Route::get('/documentcontact', function () {
	return view('frontend.mock.document-contact');
});
Route::get('/listmedia', function () {
	return view('frontend.mock.listmedia');
});
Route::get('/listnews', function () {
	return view('frontend.mock.listnews');
});
Route::get('/listprofessional-file', function () {
	return view('frontend.mock.listprofessional-file');
});

Route::get('/contact-us', function () {
	return view('frontend.mock.contact-us');
});
Route::get('/list-doc-pro', function () {
	return view('frontend.mock.list-doc-pro');
});
Route::get('/list-doc-org', function () {
	return view('frontend.mock.list-doc-org');
});
Route::get('/list-doc-ngo', function () {
	return view('frontend.mock.list-doc-ngo');
});
Route::get('/listngo-file', function () {
	return view('frontend.mock.listngo-file');
});

Route::get('forget-password', 'Frontend\AuthController@getForgetPassword');
Route::post('forget-password', 'Frontend\AuthController@postForgetPassword');
Route::get('change-password', 'Frontend\AuthController@getChangePassword');
Route::post('change-password', 'Frontend\AuthController@postChangePassword');

Route::get('/login', 'Frontend\AuthController@getLogin');
Route::get('/logout', 'Frontend\AuthController@logout');
Route::post('/login', 'Frontend\AuthController@postLogin');
Route::get('/vote', 'Frontend\AuthController@vote');
Route::get('/vote-confirm', 'Frontend\AuthController@voteConfirm');

Route::get('/vote-confirm-notpass', 'Frontend\AuthController@voteConfirmNotPass');
Route::get('/vote-confirm-notpass2', 'Frontend\AuthController@voteConfirmNotPass2');

Route::get('/vote-confirm/confirm', 'Frontend\AuthController@voteConfirmApprove');
Route::get('/vote-confirm/resend', 'Frontend\AuthController@voteConfirmResend');

Route::get('vote-confirm/flipbook_page', 'Frontend\AuthController@voteConfirmFlippage');

Route::get('/vote-schedule', 'Frontend\AuthController@voteSchedule');

Route::get('/professional-news', 'Frontend\ProfessionalController@index')->name('professional.news');
Route::get('/professional-login', 'Frontend\ProfessionalController@login')->name('professional.login');
Route::post('/professional-logging', 'Frontend\ProfessionalController@postLogin')->name('professional.logging');
Route::get('/delete/member', 'Frontend\AuthController@deleteMemberGet')->name('delete.member.get');
Route::post('/delete/member', 'Frontend\AuthController@deleteMemberPost')->name('delete.member.post');

Route::get('confirm/register/{id}', 'Frontend\AuthController@confirmRegisterGet')->name('confirm.register.get');

Route::get('cancel-form/{group}/{step}', function ($group, $step) {
	try {
		Mail::to(Auth::user()->email)->send(new \App\Mail\CancelRegister(Auth::user(), $group, $step));

	} catch (\Exception $e) {
		dd($e);
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


				Route::group([
					'prefix' 	=> 'election',
					'as' 		=> 'election',
					'namespace' => 'Frontend'
				], function() {
					Route::get('/', 'ElectionController@index');
					Route::post('vote', 'ElectionController@vote');
				});

				//

				Route::group(['prefix'=>'backend/groupadmin', 'as' => 'backend.groupadmin.', 'namespace' => 'Backend'], function() {
					Route::get('index', 'GroupAdminController@index')->name('index');
					Route::get('create', 'GroupAdminController@create')->name('create');
					Route::post('update/{id}', 'GroupAdminController@update')->name('update');
					Route::post('store', 'GroupAdminController@store')->name('store');
					Route::get('edit/{id}', 'GroupAdminController@edit')->name('edit');
					Route::get('delete/{id}', 'GroupAdminController@destroy')->name('delete');
				});

				Route::group([
					'prefix'=>'backend/module',
					'as' => 'backend.module.',
					'namespace' => 'Backend'
				], function() {
					Route::get('/', 'ModuleController@index');
					Route::get('add', 'ModuleController@create');
					Route::post('add', 'ModuleController@store');
					Route::get('remove/{id}', 'ModuleController@destroy');
				});
