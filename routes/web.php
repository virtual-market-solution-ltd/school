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
 * 
 * Dashboard for everyone after login 
 * 
 */
Route::get('/dashboard', function () {
    $date = date('Y-m-d');
    $schools_id = \Auth::user()->schools_id;
    $events = \App\Events::where('schools_id',$schools_id)->get();
    $notices = \App\Notice::where('schools_id',$schools_id)->orderBy('id','desc')->get();
    return view('backend.dashboard')->with(compact('events','notices'));
});

/**
 * 
 * SuperAdmin Routes
 * 
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
//Route::resource('classwork', 'ClassworkController');
Route::resource('meeting', 'MeetingRequestController');
Route::resource('leave-application', 'LeaveApplicationController');
Route::resource('holiday', 'HolidayController');
Route::resource('examroutine', 'ExamRoutineController');
Route::resource('notice', 'NoticeController');
Route::resource('transport', 'TransportController');
Route::resource('result', 'ExamResultController');
Route::post('/ajaxresult', 'ExamResultController@ajax')->name('result.ajax');
Route::get('/result-view', 'ExamResultController@result_view')->name('result.result_view');
Route::resource('academic-calendar', 'AcademicCalendarController');
Route::resource('syllabus', 'SyllabusController');

Route::get('/students','StudentsController@index')->name('students.index');
Route::post('/students','StudentsController@update')->name('students.update');;
Route::get('/students/{id}/edit','StudentsController@edit')->name('students.edit');;

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
 * 
 * Events
 * 
 */
Route::get('/events', 'EventsController@index')->name('events');

/**
 * 
 * Human Resource Management
 * Route Template :  Route::get('/', 'HRController@')->name('hr.');
 * 
 */
Route::get('/employee', 'HRController@employee')->name('hr.employee');
Route::get('/employee/create', 'HRController@employee_create')->name('hr.employee.create');
Route::get('/employee/{id}/edit', 'HRController@employee_edit')->name('hr.employee.edit');
Route::post('/employee', 'HRController@employee_store')->name('hr.employee');
Route::put('/employee', 'HRController@employee_update')->name('hr.employee');

Route::get('/extra-salary', 'HRController@extra_salary')->name('hr.extra_salary');
Route::post('/extra-salary', 'HRController@extra_salary_store')->name('hr.extra_salary');

Route::get('/extra-salary-deduct', 'HRController@extra_salary_deduct')->name('hr.extra_salary_deduct');
Route::post('/extra-salary-deduct', 'HRController@extra_salary_deduct_store')->name('hr.extra_salary_deduct');

Route::get('/salary-process-info', 'HRController@salary_process_info')->name('hr.salary_process_info');
Route::post('/salary-process-info', 'HRController@salary_process_info_store')->name('hr.salary_process_info');

Route::get('/hr-account-salary-sheet', 'HRController@hr_account_salary_sheet')->name('hr.hr_account_salary_sheet');
Route::post('/hr-account-salary-sheet', 'HRController@hr_account_salary_sheet_store')->name('hr.hr_account_salary_sheet');


Route::get('/hr-attendance', 'HRController@hr_attendance')->name('hr.hr_attendance');
Route::post('/hr-attendance', 'HRController@hr_attendance_store')->name('hr.hr_attendance');




Route::get('/incometaxsetup', 'HRController@income_tax_setup')->name('hr.income_tax_setup');
Route::post('/incometaxsetup', 'HRController@income_tax_setup_store')->name('hr.income_tax_setup');
Route::put('/incometaxsetup', 'HRController@income_tax_setup_update')->name('hr.income_tax_setup');

Route::get('/areas', 'HRController@areas')->name('hr.areas');
Route::post('/areas', 'HRController@areas_store')->name('hr.areas');
Route::put('/areas', 'HRController@areas_update')->name('hr.areas');

Route::get('/nationality', 'HRController@nationality')->name('hr.nationality');
Route::post('/nationality', 'HRController@nationality_store')->name('hr.nationality');
Route::put('/nationality', 'HRController@nationality_update')->name('hr.nationality');

Route::get('/religion', 'HRController@religion')->name('hr.religion');
Route::post('/religion', 'HRController@religion_store')->name('hr.religion');
Route::put('/religion', 'HRController@religion_update')->name('hr.religion');

Route::get('/maritalstatus', 'HRController@maritalstatus')->name('hr.maritalstatus');
Route::post('/maritalstatus', 'HRController@maritalstatus_store')->name('hr.maritalstatus');
Route::put('/maritalstatus', 'HRController@maritalstatus_update')->name('hr.maritalstatus');

Route::get('/department', 'HRController@department')->name('hr.department');
Route::post('/department', 'HRController@department_store')->name('hr.department');
Route::put('/department', 'HRController@department_update')->name('hr.department');

Route::get('/site', 'HRController@site')->name('hr.site');
Route::post('/site', 'HRController@site_store')->name('hr.site');
Route::put('/site', 'HRController@site_update')->name('hr.site');

Route::get('/designationgroup', 'HRController@designationgroup')->name('hr.designationgroup');
Route::post('/designationgroup', 'HRController@designationgroup_store')->name('hr.designationgroup');
Route::put('/designationgroup', 'HRController@designationgroup_update')->name('hr.designationgroup');

Route::get('/designation', 'HRController@designation')->name('hr.designation');
Route::post('/designation', 'HRController@designation_store')->name('hr.designation');
Route::put('/designation', 'HRController@designation_update')->name('hr.designation');

Route::get('/grade', 'HRController@grade')->name('hr.grade');
Route::post('/grade', 'HRController@grade_store')->name('hr.grade');
Route::put('/grade', 'HRController@grade_update')->name('hr.grade');
Route::get('/grade/{id}/edit', 'HRController@grade_edit')->name('hr.grade_edit');





/**
 * INVENTORY
 */
Route::get('/items', 'InventoryController@add_items')->name('inventory.add_items');
Route::post('/items', 'InventoryController@add_items_store')->name('inventory.add_items_store');


Route::get('/inventorylocationtransfer', 'InventoryController@inventorylocationtransfer')->name('inventorylocationtransfer');
Route::get('/inventoryadjustment', 'InventoryController@inventoryadjustment')->name('inventoryadjustment');

Route::get('/inventorylocation', 'InventoryController@inventory_location')->name('inventory.inventorylocation');
Route::post('/inventorylocation', 'InventoryController@inventory_location_store')->name('inventory.inventorylocation_store');

Route::get('/inventorymovement', 'InventoryController@inventory_movement')->name('inventory.inventorymovement');
Route::post('/inventorymovement', 'InventoryController@inventory_movement_store')->name('inventory.inventorymovement_store');

Route::get('/unitofmeasure', 'InventoryController@unitofmeasure')->name('inventory.unitofmeasure');
Route::post('/unitofmeasure', 'InventoryController@unitofmeasure_store')->name('inventory.unitofmeasure_store');
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

Route::get('/account-hr-salary-sheet', 'AccountsController@hr_account_salary_sheet')->name('accounts.hr_account_salary_sheet');
Route::put('/account-hr-salary-sheet-update', 'AccountsController@hr_account_salary_sheet_update')->name('accounts.hr_account_salary_sheet_update');

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
/* 
Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
*/
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/accounts_deposit_view', 'AccountsController@accounts_deposit_view')->name('accounts.accounts_deposit_view');
Route::post('/accounts_deposit_view', 'AccountsController@accounts_deposit_store')->name('accounts.accounts_deposit_store');
/* 
Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
*/
/*------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::get('/bank_account_transfer_view', 'AccountsController@bank_account_transfer_view')->name('accounts.bank_account_transfer_view');
Route::post('/bank_account_transfer_store', 'AccountsController@bank_account_transfer_store')->name('accounts.bank_account_transfer_store');
/* 
Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
*/
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::get('/journal_entry_view', 'AccountsController@journal_entry_view')->name('accounts.journal_entry_view');
Route::post('/journal_entry_store', 'AccountsController@journal_entry_store')->name('accounts.journal_entry_store');
/* 
Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
Route::get('/bank_accounts_edit/{id}/edit', 'AccountsController@bank_accounts_edit')->name('accounts.bank_accounts_edit');
Route::put('/bank_accounts_update', 'AccountsController@bank_accounts_update')->name('accounts.bank_accounts_update');
*/
/*------------------------------------------------------------------------------------------------------------------------------------------------*/


Route::get('/budget_entry_view', 'AccountsController@budget_entry_view')->name('accounts.budget_entry_view');
Route::post('/budget_entry_view', 'AccountsController@budget_entry_view')->name('accounts.budget_entry_view');
Route::put('/budget_entry_update', 'AccountsController@budget_entry_update')->name('accounts.budget_entry_update');


/* 
Route::post('/bank_accounts_store', 'AccountsController@bank_accounts_store')->name('accounts.bank_accounts_store');
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


