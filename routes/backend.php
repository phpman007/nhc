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

    Route::match(['get', 'post'],'/index', 'CheckSNController@index')->name('check.index');
    Route::get('/excelSN', 'CheckSNController@exportExcel')->name('check.excelSN');

    Route::match(['get', 'post'],'/memCheck', 'memberCheckController@index')->name('check.memCheck');
    Route::get('/excelMEM', 'memberCheckController@exportExcel')->name('check.excelMEM');

    Route::match(['get', 'post'],'/ngoCheck', 'ngoCheckController@index')->name('check.ngoCheck');
    Route::get('/excelNGO', 'ngoCheckController@exportExcel')->name('check.excelNGO');

    Route::match(['get', 'post'],'/orCheck', 'orCheckController@index')->name('check.orCheck');
    Route::get('/excelOR', 'orCheckController@exportExcel')->name('check.excelOR');

});

Route::group(['prefix' => 'approve'], function () {
    Route::get('/snApprove', 'ApproveSNController@index')->name('approveSN.index');
    Route::get('/editstatusSN', 'ApproveSNController@editstatus')->name('approveSN.editstatus');
    Route::get('/editnotpassSN', 'ApproveSNController@editnotpass')->name('approveSN.editnotpass');

    Route::get('/orApprove', 'ApproveORController@index')->name('approveOR.index');
    Route::get('/editstatusOR', 'ApproveORController@editstatus')->name('approveOR.editstatus');
    Route::get('/editnotpassOR', 'ApproveORController@editnotpass')->name('approveOR.editnotpass');

    Route::get('/ngoApprove', 'ApproveNGOController@index')->name('approveNGO.index');
    Route::get('/editstatusNGO', 'ApproveNGOController@editstatus')->name('approveNGO.editstatus');
    Route::get('/editnotpassNGO', 'ApproveNGOController@editnotpass')->name('approveNGO.editnotpass');

    Route::get('/memApprove', 'ApproveMemberController@index')->name('approveMEM.index');
    Route::get('/editstatusMEM', 'ApproveMemberController@editstatus')->name('approveMEM.editstatus');
    Route::get('/editnotpassMEM', 'ApproveMemberController@editnotpass')->name('approveMEM.editnotpass');

});

Route::group(['prefix' => 'confirm'], function () {

    Route::get('/snConfirm', function () {return view('backend.Confirm.snConfirm');});
    Route::get('/orConfirm', function () {return view('backend.Confirm.orConfirm');});
    Route::get('/ngoConfirm', function () {return view('backend.Confirm.ngoConfirm');});

});

Route::group(['prefix' => 'RT'], function () {
    Route::match(['get', 'post'],'/snRT', 'RealtimeSNController@index')->name('realtimeSN.index');
    // Route::get('/snRT', function () {return view('backend.RT.snRT');});
    // Route::get('/orRT', function () {return view('backend.RT.orRT');});
    // Route::get('/ngoRT', function () {return view('backend.RT.ngoRT');});

});

Route::group(['prefix' => 'draw'], function () {

    Route::get('/snDraw', function () {return view('backend.draw.snDraw');});
    Route::get('/orDraw', function () {return view('backend.draw.orDraw');});
    Route::get('/ngoDraw', function () {return view('backend.draw.ngoDraw');});

});
?>
