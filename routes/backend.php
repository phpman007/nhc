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


Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
Route::post('/user/update/{id}', 'UserController@update');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/test', function () {return view('backend.user.test');});

    // Route::get('/insElection', 'ElectionsController@create')->name('insElection');
    // Route::get('/store', 'ElectionsController@store')->name('member.store');

Route::group(['prefix' => 'election'], function () {
    Route::get('/snElection', 'ElectionSNController@index')->name('electionSN.index');
    Route::get('/changedate', 'ElectionSNController@edit')->name('electionSN.changedate');
    Route::get('/changedate2', 'ElectionSNController@edit2')->name('electionSN.changedate2');
    Route::get('/changedate3', 'ElectionSNController@edit3')->name('electionSN.changedate3');

    Route::get('/orElection', 'ElectionORController@index')->name('electionOR.index');
    Route::get('/ORchangedate', 'ElectionORController@edit')->name('electionOR.changedate');
    Route::get('/ORchangedate2', 'ElectionORController@edit2')->name('electionOR.changedate2');
    Route::get('/ORchangedate3', 'ElectionORController@edit3')->name('electionOR.changedate3');

    Route::get('/ngoElection', 'ElectionNGOController@index')->name('electionNGO.index');
    Route::get('/NGOchangedate', 'ElectionNGOController@edit')->name('electionNGO.changedate');
    Route::get('/NGOchangedate2', 'ElectionNGOController@edit2')->name('electionNGO.changedate2');
    Route::get('/NGOchangedate3', 'ElectionNGOController@edit3')->name('electionNGO.changedate3');
});

Route::group(['prefix' => 'check'], function () {

    // Route::get('/snCheckView/{id}', 'CheckSNController@snCheckView')->name('check.snCheckView');
    // Route::get('/orCheckView/{id}', 'CheckSNController@orCheckView')->name('check.orCheckView');
    // Route::get('/ngoCheckView/{id}', 'CheckSNController@ngoCheckView')->name('check.ngoCheckView');
    // Route::get('/memCheckView/{id}', 'CheckSNController@memCheckView')->name('check.memCheckView');

    Route::match(['get', 'post'],'/index', 'CheckSNController@index');
    Route::get('/editSN/{id}', 'CheckSNController@edit');
    Route::get('/excelSN', 'CheckSNController@exportExcel');
    Route::get('/editstatusSN', 'CheckSNController@editstatus');
    Route::get('/editnotpassSN', 'CheckSNController@editnotpass');

    Route::match(['get', 'post'],'/memCheck', 'memberCheckController@index');
    Route::get('/editMEM/{id}', 'memberCheckController@edit');
    Route::get('/excelMEM', 'memberCheckController@exportExcel');

    Route::match(['get', 'post'],'/ngoCheck', 'ngoCheckController@index');
    Route::get('/editNGO/{id}', 'ngoCheckController@edit');
    Route::get('/excelNGO', 'ngoCheckController@exportExcel');

    Route::match(['get', 'post'],'/orCheck', 'orCheckController@index');
    Route::get('/editOR/{id}', 'orCheckController@edit');
    Route::get('/excelOR', 'orCheckController@exportExcel');

});

Route::group(['prefix' => 'approve'], function () {
    Route::get('/snApprove', 'ApproveSNController@index')->name('approveSN.index');
    // Route::get('/editstatusSN', 'ApproveSNController@editstatus')->name('approveSN.editstatus');
    // Route::get('/editnotpassSN', 'ApproveSNController@editnotpass')->name('approveSN.editnotpass');

    Route::get('/orApprove', 'ApproveORController@index')->name('approveOR.index');
    Route::get('/editstatusOR', 'ApproveORController@editstatus')->name('approveOR.editstatus');
    Route::get('/editnotpassOR', 'ApproveORController@editnotpass')->name('approveOR.editnotpass');

    Route::get('/ngoApprove', 'ApproveNGOController@index')->name('approveNGO.index');
    Route::get('/editstatusNGO', 'ApproveNGOController@editstatus')->name('approveNGO.editstatus');
    Route::get('/editnotpassNGO', 'ApproveNGOController@editnotpass')->name('approveNGO.editnotpass');

    Route::get('/memApprove', 'ApproveMemberController@index')->name('approveMEM.index');
    Route::get('/editstatusMEM', 'ApproveMemberController@editstatus')->name('approveMEM.editstatus');
    Route::get('/editnotpassMEM', 'ApproveMemberController@editnotpass')->name('approveMEM.editnotpass');

    Route::get('/aa', function () {return view('mail.test');});

});

Route::group(['prefix' => 'confirm'], function () {

    Route::get('/snConfirm', function () {return view('backend.Confirm.snConfirm');});
    Route::get('/orConfirm', function () {return view('backend.Confirm.orConfirm');});
    Route::get('/ngoConfirm', function () {return view('backend.Confirm.ngoConfirm');});

});

Route::group(['prefix' => 'RT'], function () {
    Route::match(['get', 'post'],'/snRT', 'RealtimeSNController@index')->name('realtimeSN.index');
    // Route::get('/snRT', function () {return view('backend.RT.snRT');});
    Route::get('/orRT', function () {return view('backend.RT.orRT');});
    Route::get('/ngoRT', function () {return view('backend.RT.ngoRT');});
});

Route::group(['prefix' => 'draw'], function () {

    Route::get('/snDraw', function () {return view('backend.draw.snDraw');});
    Route::get('/orDraw', function () {return view('backend.draw.orDraw');});
    Route::get('/ngoDraw', function () {return view('backend.draw.ngoDraw');});

});

Route::get('/previewRegister/{id}', 'CheckSNController@snPreview');

Route::get('/registerReview/{id}', function($id) {
    return event(new App\Events\FinishRegister(App\Model\Frontend\Member::find($id), 1))[0]->stream();
});

Route::get('/permission', function () {return view('backend/permission/index');});
Route::get('/permission/create', function () {return view('backend/permission/form');});
?>
