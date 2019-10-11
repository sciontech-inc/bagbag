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
// USER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'user'], function (){
    Route::get          ('/',                            'UserController@index'                    )->name('reason');
    Route::post         ('/save',                        'UserController@store'                    )->name('reason_store');
    Route::post         ('/save_user',                   'UserController@store_user'               )->name('reason_store');
    Route::get          ('/edit/{id}',                   'UserController@edit'                     )->name('reason_edit');
    Route::post         ('/update/{id}',                 'UserController@update'                   )->name('reason_update');
    Route::get          ('/destroy/{id}',                'UserController@destroy'                  )->name('reason_update');
});

// FRONT END
Route::prefix('barangay')->group(function(){
    Route::get          ('/',                            'BarangayController@index'             )->name('todo');
    Route::get          ('/create',                      'TodolistController@create'            )->name('todo_create');
    Route::post         ('/save',                        'TodolistController@store'             )->name('todo_save');
    Route::get          ('/confirmView',                 'TodolistController@confirmView'       )->name('todo_confirm');
    Route::post         ('/confirm',                     'TodolistController@confirm'           )->name('todo_confirm');
    Route::get          ('/queue',                       'BarangayController@queue'             )->name('todo');

});

// MISSION
Route::prefix('mission')->group(function(){
    Route::get          ('/',                            'MissionController@index'              )->name('todo');
    Route::get          ('/edit/{id}',                   'MissionController@edit'               )->name('todo_create');
    Route::post         ('/update/{id}',                 'MissionController@update'             )->name('todo_save');
});

// EVENT CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'event'], function (){
    Route::get          ('/',                            'EventController@index'                  )->name('reason');
    Route::post         ('/save',                        'EventController@store'                  )->name('reason');
    Route::get          ('/edit/{id}',                   'EventController@edit'                   )->name('reason');
    Route::post         ('/update/{id}',                 'EventController@update'                 )->name('reason_update');
    Route::get          ('/destroy/{id}',                'EventController@destroy'                )->name('reason_update');
});

// ITEM CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'item'], function (){
    Route::get          ('/',                            'ItemController@index'                  )->name('reason');
    Route::post         ('/save',                        'ItemController@store'                  )->name('reason');
    Route::get          ('/edit/{id}',                   'ItemController@edit'                   )->name('reason');
    Route::post         ('/update/{id}',                 'ItemController@update'                 )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ItemController@destroy'                )->name('reason_update');
});

// ANNOUNCEMENT CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'announcement'], function (){
    Route::get          ('/',                            'AnnouncementController@index'           )->name('reason');
    Route::post         ('/save',                        'AnnouncementController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'AnnouncementController@edit'            )->name('reason');
    Route::post         ('/update/{id}',                 'AnnouncementController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'AnnouncementController@destroy'         )->name('reason_update');
});

// PROJECT CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'project'], function (){
    Route::get          ('/',                            'ProjectController@index'                )->name('reason');
    Route::post         ('/save',                        'ProjectController@store'                )->name('reason');
    Route::get          ('/edit/{id}',                   'ProjectController@edit'                 )->name('reason');
    Route::post         ('/update/{id}',                 'ProjectController@update'               )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ProjectController@destroy'              )->name('reason_update');
});

// BLOTTER CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'blotter'], function (){
    Route::get          ('/',                            'BlotterController@index'           )->name('reason');
    Route::get          ('/save',                        'BlotterController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'BlotterController@edit'            )->name('reason');
    Route::get          ('/update/{id}',                 'BlotterController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'BlotterController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'BlotterController@redraw'          )->name('reason_update');
    Route::get          ('/blotterVerification',         'BlotterController@blotterVerification'          )->name('reason_update');
    Route::get          ('/archived',                    'BlotterController@archived'         )->name('reason_update');
    Route::get          ('/restore/{id}',                'BlotterController@restore'         )->name('reason_update');
});

// INCIDENT TYPE CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'incident-type'], function (){
    Route::get          ('/',                            'IncidentTypeController@index'           )->name('reason');
    Route::get          ('/save',                        'IncidentTypeController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'IncidentTypeController@edit'            )->name('reason');
    Route::get          ('/update/{id}',                 'IncidentTypeController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'IncidentTypeController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'IncidentTypeController@redraw'          )->name('reason_update');
});

// KAGAWAD CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'kagawad'], function (){
    Route::get          ('/',                            'KagawadController@index'           )->name('reason');
    Route::post         ('/save',                        'KagawadController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'KagawadController@edit'            )->name('reason');
    Route::get          ('/update/{id}',                 'KagawadController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'KagawadController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'KagawadController@redraw'          )->name('reason_update');
});

// KAGAWAD CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'position'], function (){
    Route::get          ('/',                            'PositionController@index'           )->name('reason');
    Route::get          ('/save',                        'PositionController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'PositionController@edit'            )->name('reason');
    Route::get          ('/update/{id}',                 'PositionController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'PositionController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'PositionController@redraw'          )->name('reason_update');
});

// KAGAWAD CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'resident'], function (){
    Route::get          ('/',                            'ResidentController@index'           )->name('reason');
    Route::get          ('/save',                        'ResidentController@store'           )->name('reason');
    Route::get          ('/edit/{id}',                   'ResidentController@edit'            )->name('reason');
    Route::get          ('/update/{id}',                 'ResidentController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ResidentController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'ResidentController@redraw'          )->name('reason_update');
});


// biodata CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'biodata'], function (){
    Route::get          ('/{id}',                        'BiodataController@index'           )->name('reason');
    Route::get          ('/fingerprint/{id}',            'BiodataController@fingerprint'     )->name('reason');
    Route::get          ('/residentUpdate',              'BiodataController@residentUpdate'            )->name('reason');
    Route::get          ('/update/{id}',                 'BiodataController@update'          )->name('reason_update');
    Route::get          ('/destroy/{id}',                'BiodataController@destroy'         )->name('reason_update');
    Route::get          ('/redraw',                      'BiodataController@redraw'          )->name('reason_update');
});
// KAGAWAD CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'queue'], function (){
    Route::get          ('/',                            'QueueController@index'              )->name('reason');
    Route::get          ('/save',                        'QueueController@store'              )->name('reason');
    Route::get          ('/edit/{id}',                   'QueueController@edit'               )->name('reason');
    Route::get          ('/update/{id}',                 'QueueController@update'             )->name('reason_update');
    Route::get          ('/destroy/{id}',                'QueueController@destroy'            )->name('reason_update');
    Route::get          ('/redraw',                      'QueueController@redraw'             )->name('reason_update');
    Route::get          ('/status/{id}',                 'QueueController@update'             )->name('reason_update');
});

// CASHIER CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'cashier'], function (){
    Route::get          ('/',                            'CashierController@index'              )->name('reason');
    Route::get          ('/save',                        'CashierController@store'              )->name('reason');
    Route::get          ('/edit/{id}',                   'CashierController@edit'               )->name('reason');
    Route::get          ('/update/{id}',                 'CashierController@update'             )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CashierController@destroy'            )->name('reason_update');
    Route::get          ('/redraw/{id}',                 'CashierController@redraw'             )->name('reason_update');
    Route::get          ('/printReceipt/{id}',           'CashierController@printReceipt'       )->name('reason_update');
    Route::get          ('/item/{id}',                   'CashierController@item'               )->name('reason_update');
});

// RECEIPT CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'receipt'], function (){
    Route::get          ('/',                            'ReceiptController@index'              )->name('reason');
    Route::get          ('/save',                        'ReceiptController@store'              )->name('reason');
    Route::get          ('/edit/{id}',                   'ReceiptController@edit'               )->name('reason');
    Route::get          ('/update/{id}',                 'ReceiptController@update'             )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ReceiptController@destroy'            )->name('reason_update');
    Route::get          ('/redraw',                      'ReceiptController@redraw'             )->name('reason_update');
});

// GLOBAL CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'global'], function (){
    Route::get          ('/registerCode',                'GlobalController@registerCode'           )->name('reason');
    Route::get          ('/residentCode',                'GlobalController@residentCode'           )->name('reason');
    Route::get          ('/blotterCode',                 'GlobalController@blotterCode'            )->name('reason');
    Route::get          ('/queuingCode',                 'GlobalController@queuingCode'            )->name('reason');
    Route::get          ('/receiptNo',                   'GlobalController@receiptNo'            )->name('reason');
});

// TRANSACTION CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'transaction'], function (){
    Route::get          ('/clearance',                   'TransactionController@clearance'           )->name('reason');
    Route::post         ('/store',                       'TransactionController@store'           )->name('reason');
    Route::get          ('/blotterCode',                 'GlobalController@blotterCode'            )->name('reason');
    Route::get          ('/queuingCode',                 'GlobalController@queuingCode'            )->name('reason');
    Route::get          ('/receiptNo',                   'GlobalController@receiptNo'            )->name('reason');
});

// TRANSACTION CONTROLLER
Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'report'], function (){
    Route::get          ('/resident',                   'ReportController@resident'           )->name('reason');
    Route::get          ('/clearance',                  'ReportController@clearance'           )->name('reason');
    Route::get          ('/receipt',                    'ReportController@receipt'           )->name('reason');
});

Route::get('/', function () {
    return view('businessDev/partials/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
