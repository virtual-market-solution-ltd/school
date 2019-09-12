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
    Route::resource('homeworkrelation', 'HomeworkRelationController');
    Route::resource('homework', 'HomeworkController');
    //Route::resource('classworkrelation', 'ClasworkRelationController');
    // Route::resource('classwork', 'ClassworkController');
    Route::resource('meeting', 'MeetingRequestController');
    Route::resource('holiday', 'HolidayController');
    Route::resource('examroutine', 'ExamRoutineController');
    Route::resource('notice', 'NoticeController');



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
});


