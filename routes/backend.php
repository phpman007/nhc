<?php
Route::get('login', 'UserController@getLogin')->name('login.get');
Route::post('login', 'UserController@postLogin')->name('login.post');
Route::get('logout', 'UserController@getLogout')->name('logout.get');

Route::get('index', function() {
      return redirect('backend/home');
});

Route::get('home', function() {
      return view('backend.theme.master');
});


    // Route::get('/insElection', 'ElectionsController@create')->name('insElection');
    // Route::get('/store', 'ElectionsController@store')->name('member.store');


Route::group(['prefix' => 'election'], function () {

    Route::get('/snSet', function () {return view('backend.election.snSet');});
    Route::get('/orSet', function () {return view('backend.election.orSet');});
    Route::get('/ngoSet', function () {return view('backend.election.ngoSet');});

});

Route::group(['prefix' => 'check'], function () {

    Route::match(['get', 'post'],'/index', 'CheckSNController@index')->name('check.index');
    Route::get('/snCheck', function () {return view('backend.check.snCheck');});
    // Route::get('/orCheck', function () {return view('backend.check.orCheck');});
    // Route::get('/ngoCheck', function () {return view('backend.check.ngoCheck');});
    // Route::get('/memCheck', function () {return view('backend.check.memCheck');});
    Route::match(['get', 'post'],'/memCheck', 'memberCheckController@index')->name('check.memCheck');
    Route::match(['get', 'post'],'/ngoCheck', 'ngoCheckController@index')->name('check.ngoCheck');
    Route::match(['get', 'post'],'/orCheck', 'orCheckController@index')->name('check.orCheck');
});

Route::group(['prefix' => 'approve'], function () {
    // Route::match(['get', 'post'],'/search', 'QuestionController@search')->name('questionuser.search');

    Route::match(['get', 'post'],'/index', 'ApproveSNController@index')->name('approve.index');
    Route::get('/editstatus', 'ApproveSNController@editstatus')->name('approve.status');
    Route::get('/snApprove', function () {return view('backend.Approve.snApprove');});
    Route::get('/orApprove', function () {return view('backend.Approve.orApprove');});
    Route::get('/ngoApprove', function () {return view('backend.Approve.ngoApprove');});
    Route::get('/memApprove', function () {return view('backend.Approve.memApprove');});

});

Route::group(['prefix' => 'confirm'], function () {

    Route::get('/snConfirm', function () {return view('backend.Confirm.snConfirm');});
    Route::get('/orConfirm', function () {return view('backend.Confirm.orConfirm');});
    Route::get('/ngoConfirm', function () {return view('backend.Confirm.ngoConfirm');});

});

Route::group(['prefix' => 'RT'], function () {

    Route::get('/snRT', function () {return view('backend.RT.snRT');});
    Route::get('/orRT', function () {return view('backend.RT.orRT');});
    Route::get('/ngoRT', function () {return view('backend.RT.ngoRT');});

});

Route::group(['prefix' => 'draw'], function () {

    Route::get('/snDraw', function () {return view('backend.draw.snDraw');});
    Route::get('/orDraw', function () {return view('backend.draw.orDraw');});
    Route::get('/ngoDraw', function () {return view('backend.draw.ngoDraw');});

});
?>
