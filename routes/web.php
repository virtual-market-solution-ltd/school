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

//Auth::routes();
Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('auth.login');
});

/**
 * All this routes requires user to be logged in.
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * SuperAdmin Routes
     */
    //Route::get('/schools', 'SchoolController@index')->name('schools');
    Route::resource('schools', 'SchoolController');
    Route::resource('users', 'UsersController');
    Route::resource('class', 'SchoolClassController');
    Route::resource('section', 'SchoolSectionController');
    Route::resource('subject', 'SchoolSubjectController');

    Route::resource('attendancerelation', 'AttendanceRelationController');
    Route::resource('attendance', 'AttendanceController');
    Route::post('/attendance/search-students', 'AttendanceController@index')->name('attendance.search-students');


    Route::get('/attendancereport', 'AttendanceController@attendanceReport');
    Route::resource('homeworkrelation', 'HomeworkRelationController');
    Route::resource('homework', 'HomeworkController');
    //Route::resource('classworkrelation', 'ClasworkRelationController');
    // Route::resource('classwork', 'ClassworkController');
    Route::resource('meeting', 'MeetingRequestController');
    Route::resource('holiday', 'HolidayController');
    Route::resource('examroutine', 'ExamRoutineController');
    Route::resource('notice', 'NoticeController');
    Route::resource('transport', 'TransportController');


    /**
     * Admin Routes
     */


    /**
     * Teacher 
     */
    
    /**
     * 
     * Student Routes 
     */ 
     



    /**
     * Dashboard for everyone after login 
     **/
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    });
    


    /**
     * EVENTS
     */
    Route::get('/events', 'EventsController@index')->name('events');
    
    /**
     * Payroll+HCM
     */
    
    Route::get('/events', 'EventsController@index')->name('events');



    /**
     * INVENTORY
     */
    Route::get('/inventorylocationtransfer', 'InventoryController@inventorylocationtransfer')->name('inventorylocationtransfer');
    Route::get('/inventoryadjustment', 'InventoryController@inventoryadjustment')->name('inventoryadjustment');

    /**
     * Dimensions
     */
    Route::get('/dimensionentry', 'DimensionController@getdimensionentry')->name('getdimensionentry');
    Route::post('/dimensionentry', 'DimensionController@postdimensionentry')->name('postdimensionentry');

/**
 * 
 * Accounts
 * 
 * Author:
 */
 /*------------------------------------------------------------------------------------------------------------------------------------------------*/   
    Route::get('/gl_account_classes_view', 'AccountsController@gl_account_classes_view')->name('accounts.gl_account_classes_view');
    Route::post('/gl_account_classes_store', 'AccountsController@gl_account_classes_store')->name('accounts.gl_account_classes_store');
    Route::get('/gl_account_classes_edit/{id}/edit', 'AccountsController@gl_account_classes_edit')->name('accounts.gl_account_classes_edit');
    Route::put('/gl_account_classes_update', 'AccountsController@gl_account_classes_update')->name('accounts.gl_account_classes_update');
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/gl_account_groups_view', 'AccountsController@gl_account_groups_view')->name('accounts.gl_account_groups_view');
    Route::post('/gl_account_groups_store', 'AccountsController@gl_account_groups_store')->name('accounts.gl_account_groups_store');
    Route::get('/gl_account_groups_edit/{id}/edit', 'AccountsController@gl_account_groups_edit')->name('accounts.gl_account_groups_edit');
    Route::put('/gl_account_groups_update', 'AccountsController@gl_account_groups_update')->name('accounts.gl_account_groups_update');
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/gl_accounts_view', 'AccountsController@gl_accounts_view')->name('accounts.gl_accounts_view');
    Route::post('/gl_accounts_store', 'AccountsController@gl_accounts_store')->name('accounts.gl_accounts_store');
    Route::get('/gl_accounts_edit/{id}/edit', 'AccountsController@gl_accounts_edit')->name('accounts.gl_accounts_edit');
    Route::put('/gl_accounts_update', 'AccountsController@gl_accounts_update')->name('accounts.gl_accounts_update');
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/bank_accounts_view', 'AccountsController@bank_accounts_view')->name('accounts.bank_accounts_view');
    Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
    Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
    Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/accounts_payments_view', 'AccountsController@accounts_payments_view')->name('accounts.accounts_payments_view');
    Route::post('/accounts_payments_store', 'AccountsController@accounts_payments_store')->name('accounts.accounts_payments_store');
   /* Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
    Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
    Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
    */
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/accounts_deposit_view', 'AccountsController@accounts_deposit_view')->name('accounts.accounts_deposit_view');
    Route::post('/accounts_deposit_view', 'AccountsController@accounts_deposit_store')->name('accounts.accounts_deposit_store');
    /* Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
     Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
     Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
     */
/*------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::get('/bank_account_transfer_view', 'AccountsController@bank_account_transfer_view')->name('accounts.bank_account_transfer_view');
Route::post('/bank_account_transfer_store', 'AccountsController@bank_account_transfer_store')->name('accounts.bank_account_transfer_store');
/* Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
 Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
 Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
 */
/**
 * 
 * SETTINGS
 * 
 */
Route::get('/fiscalyear', 'SetupController@fiscalyear_view')->name('setup.fiscalyear_view');
Route::post('/fiscalyear', 'SetupController@fiscalyear_store')->name('setup.fiscalyear_store');
Route::put('/fiscalyear', 'SetupController@fiscalyear_update')->name('setup.fiscalyear_update');



});


