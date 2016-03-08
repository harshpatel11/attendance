<?php

Route::get('/', function () {
    return view('calender/index');
});

  Route::get('graph','Graph\GraphController@check');
  Route::get('checkDate','Graph\GraphController@checkDate');
  Route::post('addholiday','Graph\GraphController@addholiday');
  

Route::group(['middleware' => ['web']], function () {
    
    Route::get('calender', function () {
	    return view('calender/index');


	});

  
});
