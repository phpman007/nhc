<?php
Route::get('login', 'UserController@getLogin')->name('login.get');
Route::post('login', 'UserController@postLogin')->name('login.post');
Route::get('logout', 'UserController@getLogout')->name('logout.get');


Route::group(['prefix'=>'backend/groupadmin', 'as' => 'backend.groupadmin.', 'namespace' => 'Backend'], function() {
    Route::get('index', 'GroupAdminController@index')->name('index');
    Route::get('create', 'GroupAdminController@create')->name('create');
    Route::post('update/{id}', 'GroupAdminController@update')->name('update');
    Route::post('store', 'GroupAdminController@store')->name('store');
    Route::get('edit/{id}', 'GroupAdminController@edit')->name('edit');
    Route::get('delete/{id}', 'GroupAdminController@destroy')->name('delete');
});

Route::group( ['middleware' => ['authAdmin'] ] , function() {

Route::get('index', function() {
      return redirect('backend/home');
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
    Route::get('/changetime1', 'ElectionSNController@edit3')->name('electionSN.changetime1');
    Route::get('/changetime2', 'ElectionSNController@edit4')->name('electionSN.changetime2');

    Route::get('/orElection', 'ElectionORController@index')->name('electionOR.index');
    Route::get('/ORchangedate', 'ElectionORController@edit')->name('electionOR.changedate');
    Route::get('/ORchangedate2', 'ElectionORController@edit2')->name('electionOR.changedate2');
    Route::get('/ORchangetime1', 'ElectionORController@edit3')->name('electionOR.changetime1');
    Route::get('/ORchangetime2', 'ElectionORController@edit4')->name('electionOR.changetime2');

    Route::get('/ngoElection', 'ElectionNGOController@index')->name('electionNGO.index');
    Route::get('/NGOchangedate', 'ElectionNGOController@edit')->name('electionNGO.changedate');
    Route::get('/NGOchangedate2', 'ElectionNGOController@edit2')->name('electionNGO.changedate2');
    Route::get('/NGOchangetime1', 'ElectionNGOController@edit3')->name('electionNGO.changetime1');
    Route::get('/NGOchangetime2', 'ElectionNGOController@edit4')->name('electionNGO.changetime2');
});

Route::group(['prefix' => 'check'], function () {

    Route::match(['get', 'post'],'/index', 'CheckSNController@index');
    Route::get('/editSN/{id}', 'CheckSNController@edit');
    Route::get('/excelSN', 'CheckSNController@exportExcel');
    Route::get('/editstatusSN', 'CheckSNController@editstatus');
    Route::get('/editnotpassSN', 'CheckSNController@editnotpass');

    Route::match(['get', 'post'],'/ngoCheck', 'ngoCheckController@index');
    Route::get('/editNGO/{id}', 'ngoCheckController@edit');
    Route::get('/excelNGO', 'ngoCheckController@exportExcel');
    Route::get('/editstatusNGO', 'ngoCheckController@editstatus');
    Route::get('/editnotpassNGO', 'ngoCheckController@editnotpass');

    Route::match(['get', 'post'],'/memCheck', 'memberCheckController@index');
    Route::get('/editMEM/{id}', 'memberCheckController@edit');
    Route::get('/excelMEM', 'memberCheckController@exportExcel');
    Route::get('/editstatusMEM', 'memberCheckController@editstatus');
    Route::get('/editnotpassMEM', 'memberCheckController@editnotpass');
    Route::get('/editfixstatusMEM', 'memberCheckController@editfixstatus');

    // Route::match(['get', 'post'],'/ngoCheck', 'ngoCheckController@index');
    // Route::get('/editNGO/{id}', 'ngoCheckController@edit');
    // Route::get('/excelNGO', 'ngoCheckController@exportExcel');
    // Route::get('/editstatusNGO', 'ngoCheckController@editstatus');
    // Route::get('/editnotpassNGO', 'ngoCheckController@editnotpass');
    // Route::get('/editfixstatusNGO', 'ngoCheckController@editfixstatus');

    Route::match(['get', 'post'],'/orCheck', 'orCheckController@index');
    Route::get('/editOR/{id}', 'orCheckController@edit');
    Route::get('/excelOR', 'orCheckController@exportExcel');
    Route::get('/editstatusOR', 'orCheckController@editstatus');
    Route::get('/editnotpassOR', 'orCheckController@editnotpass');
    Route::get('/editfixstatusOR', 'orCheckController@editfixstatus');

});

Route::group(['prefix' => 'approve'], function () {
    Route::get('/snApprove', 'ApproveSNController@index');
    Route::get('/editfixstatusSN/{id}', 'ApproveSNController@editfixstatus');
    Route::get('/docSN', 'ApproveSNController@documents');
    Route::get('/pdfSN/{id}', 'ApproveSNController@genPDF1');
    Route::get('/wordSN/{id}', 'ApproveSNController@exportWord');
    Route::post('/uploadPDFsn/{id}', 'ApproveSNController@uploadPDF');
    Route::get('/deletePDFsn/{id}', 'ApproveSNController@delcompletePDF');
    Route::get('/mailSN/{id}', 'ApproveSNController@mail');

    Route::get('/ngoApprove', 'ApproveNGOController@ngoapprove');
    Route::get('/ngoApprove/index', 'ApproveNGOController@index');
    Route::get('/editfixstatusNGO/{idprovince}/{idgroup}', 'ApproveNGOController@editfixstatus');
    Route::get('/docNGO', 'ApproveNGOController@documents');
    Route::get('/pdfNGO/{id}', 'ApproveNGOController@genPDF1');
    Route::get('/wordNGO/{id}', 'ApproveNGOController@exportWord');
    Route::post('/uploadPDFngo/{id}', 'ApproveNGOController@uploadPDF');
    Route::get('/deletePDFngo/{id}', 'ApproveNGOController@delcompletePDF');
    Route::get('/mailNGO/{id}', 'ApproveNGOController@mail');

    Route::get('/orApprove', 'ApproveORController@index')->name('approveOR.index');
    Route::get('/editstatusOR', 'ApproveORController@editstatus')->name('approveOR.editstatus');
    Route::get('/editnotpassOR', 'ApproveORController@editnotpass')->name('approveOR.editnotpass');

    // Route::get('/ngoApprove', 'ApproveNGOController@ngoapprove');
    // Route::get('/editfixstatusNGO/{idprovince}/{idgroup}', 'ApproveNGOController@editfixstatus');


    // Route::get('/ngoApprove/index', 'ApproveNGOController@index');
    // Route::get('/editstatusNGO', 'ApproveNGOController@editstatus');
    // Route::get('/editnotpassNGO', 'ApproveNGOController@editnotpass')->name('approveNGO.editnotpass');

    Route::get('/memApprove', 'ApproveMemberController@index')->name('approveMEM.index');
    Route::get('/editstatusMEM', 'ApproveMemberController@editstatus')->name('approveMEM.editstatus');
    Route::get('/editnotpassMEM', 'ApproveMemberController@editnotpass')->name('approveMEM.editnotpass');

    Route::get('/aa', function () {return view('mail.test');});

});

Route::group(['prefix' => 'approveAll'], function () {
    Route::get('/snApproveAll/{idgroup}', 'ApproveSNController@index');
    Route::get('/snApproveSearch/{idgroup}', 'ApproveSNController@snApproveAll');
    Route::get('/ngoApproveAll/{idprovince}/{idgroup}/{idsection}', 'ApproveNGOController@ngoApproveAll');

    Route::get('/memApproveAll', function () {return view('backend.approve.memApproveAll');});
    Route::get('/orApproveAll', function () {return view('backend.approve.orApproveAll');});
});

Route::group(['prefix' => 'confirm'], function () {

    Route::get('/snConfirm', function () {return view('backend.Confirm.snConfirm');});
    Route::get('/orConfirm', function () {return view('backend.Confirm.orConfirm');});
    Route::get('/ngoConfirm', function () {return view('backend.Confirm.ngoConfirm');});

});

// Route::group(['prefix' => 'RT'], function () {
//     Route::match(['get', 'post'],'/snRT', 'RealtimeSNController@index');
//     Route::get('/snRTAll/{group_id}', 'RealtimeSNController@snRTAll');
//     Route::get('/SNconfirmvote/{group_id}', 'RealtimeSNController@comfirmvote');
//     Route::get('/SNselect/{id}', 'RealtimeSNController@selectvote');
//     // Route::get('/snRT', function () {return view('backend.RT.snRT');});
//     Route::get('/orRT', function () {return view('backend.RT.orRT');});
//     // Route::get('/ngoRT', function () {return view('backend.RT.ngoRT');});
//     Route::get('/ngoRT', 'RealtimeNGOController@ngoRT');
//     Route::get('/ngoRT/index', 'RealtimeNGOController@index');
//     Route::get('/ngoRTAll/{province_id}/{group_id}', 'RealtimeNGOController@ngoAll');
// });

Route::group(['prefix' => 'RT'], function () {
    Route::get('/snRT', 'RealtimeSNController@index');
    Route::get('/snRTAll/{group_id}', 'RealtimeSNController@snRTAll');
    Route::get('/SNconfirm/{group_id}', 'RealtimeSNController@comfirmvote');
    Route::get('/SNselect/{group_id}/{id}', 'RealtimeSNController@selectvote');

    Route::get('/ngoRT', 'RealtimeNGOController@index');
    Route::get('/ngoRTAll/{group_id}', 'RealtimeNGOController@ngoRTAll');
    Route::get('/NGOconfirm/{group_id}', 'RealtimeNGOController@comfirmvote');
    Route::get('/NGOselect/{group_id}/{id}', 'RealtimeNGOController@selectvote');
});

Route::group(['prefix' => 'draw'], function () {

    Route::get('/snDraw', function () {return view('backend.draw.snDraw');});
    Route::get('/orDraw', function () {return view('backend.draw.orDraw');});
    Route::get('/ngoDraw', function () {return view('backend.draw.ngoDraw');});

});

// Route::get('/previewRegister/{id}', 'CheckSNController@snPreview');
Route::get('/previewRegister/{id}/{name}/{group1}/{group2}/{group3}/{status1}/{status2}/{status3}', 'CheckSNController@snPreview');
Route::get('/previewRegisterV/{id}', 'CheckSNController@snPreviewV');

Route::get('/ngoPreviewV/{id}', 'CheckSNController@ngoPreviewV');
// Route::get('/ngoPreview/{id}', 'CheckSNController@ngoPreview');
Route::get('/ngoPreview/{id}/{name}/{group1}/{group2}/{group3}/{status1}/{status2}/{status3}/{section1}/{section2}/{section3}/{pro1}/{pro2}/{pro3}', 'CheckSNController@ngoPreview');

// Route::get('/ngoPreview/{id}/{idreturn}/{idprovince}/{idgroup}', 'CheckSNController@ngoPreview');
Route::get('/orPreview/{id}', 'CheckSNController@orPreview');
Route::get('/memPreview/{id}', 'CheckSNController@memPreview');

Route::get('/registerReview/{id}', function($id) {
    return event(new App\Events\FinishRegister(App\Model\Frontend\Member::find($id), 1))[0]->stream();
});

Route::get('/permission', function () {return view('backend/permission/index');});
Route::get('/permission/create', function () {return view('backend/permission/form');});

Route::group(['prefix' => 'reportlog'], function () {
    Route::get('/search', 'LogController@index');
    Route::get('/logSN1', 'LogController@logSN1');
    Route::get('/logSN2/{id}', 'LogController@logSN2');
    Route::get('/logSN3/{email}/{id}', 'LogController@logSN3');
    Route::get('/logNGO1', 'LogNGOController@logNGO1');
    Route::get('/logNGO2/{id}', 'LogNGOController@logNGO2');
    Route::get('/logNGO3/{email}/{id}', 'LogNGOController@logNGO3');
    Route::get('/logNGOregis2/{id}', 'LogNGOController@logNGOregis2');
    Route::get('/logNGOregis3/{email}/{id}', 'LogNGOController@logNGOregis3');
});

Route::group(['prefix' => 'view'], function () {

    Route::get('/snView', 'ViewSNController@index');
    Route::get('/excelSN', 'ViewSNController@exportExcel');

    Route::get('/ngoView', 'ViewNGOController@index');
    Route::get('/excelNGO', 'ViewNGOController@exportExcel');
});

Route::group(['prefix' => 'menu'], function () {
    Route::get('/','MenuController@index')->name('menu.home');
    Route::post('/store','MenuController@store')->name('menu.store');
    Route::get('/resort','MenuController@resort')->name('menu.resort');
    Route::post('/update','MenuController@update')->name('menu.update');
    Route::post('/destroy','MenuController@destroy')->name('menu.destroy');
  });
Route::get('home', 'LogController@index'

// function() {
//     return view('backend.theme.master');
// }
);
Route::group(['prefix' => 'menu'], function () {
    Route::get('/','MenuController@index')->name('menu.home');
    Route::post('/store','MenuController@store')->name('menu.store');
    Route::post('/resort','MenuController@resort')->name('menu.resort');
    Route::post('/update','MenuController@update')->name('menu.update');
    Route::post('/destroy','MenuController@destroy')->name('menu.destroy');
  });
});

Route::get('/aaa','MailFrontEndController@index');
Route::get('/bbb','MailFrontEndController@send3');
Route::get('/ccc','MailFrontEndController@send1');
// Route::get('/aaa', function () {return view('backend.mailFrontEnd');});

?>
