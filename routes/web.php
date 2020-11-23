\<?php

use Illuminate\Support\Facades\Route;

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

////////// EMPLOYEE TIME IN/OUT

// Index 
Route::get('/time-entry', 'TimeEntriesController@index');
// Store and Update
Route::put('/time-entry/storeOrUpdate', 'TimeEntriesController@storeOrUpdate');
// Update
Route::put('/time-entry/update', 'TimeEntriesController@update');

////////// ADMIN LOGIN

// Index
Route::get('/admin/login', 'AdminLoginController@index');

<<<<<<< HEAD
=======
////////// ADMIN HOMEPAGE
>>>>>>> aa5c42a2b066680a5300f586a5ca2d372e46cbe5

// Index
Route::get('/admin/home', 'HomeController@index');

////////// DAILY TIME RECORDS

// Index
Route::get('/admin/daily_time_records', 'DailyTimeRecordsController@index');
// Store
Route::post('/admin/daily_time_records/store', 'DailyTimeRecordsController@store');

////////// EMPLOYEES

// Index
Route::get('/admin/employees','EmployeesController@index');
// Create
Route::get('/admin/employees/create','EmployeesController@create');
// Show
Route::get('/admin/employees/{employee}', 'EmployeesController@show');
// Store
Route::post('/admin/employees','EmployeesController@store');
// Edit
Route::get('/admin/employees/{employee}/edit','EmployeesController@edit');
// Update
Route::put('/admin/employees/{employee}','EmployeesController@update');
// Delete
Route::delete('/admin/employees/{employee}','EmployeesController@delete');

////////// POSITIONS

<<<<<<< HEAD
Route::get('/admin/login', function () {
    return view('login-admin');
});
//CRUD for leaves_categories
//Index
Route::get('/admin/leaves-categories','LeaveCategoriesController@index');

//Create
Route::get('/admin/leaves-categories/create','LeaveCategoriesController@create');

//Store
Route::post('/admin/leaves-categories/store','LeaveCategoriesController@store');

//Edit
Route::get('/admin/leaves-categories/{id}/edit','LeaveCategoriesController@edit');

//Update
Route::put('/admin/leaves-categories/{id}','LeaveCategoriesController@update');

//Delete
Route::delete('/admin/leaves-categories/{id}','LeaveCategoriesController@delete');

//Show
Route::get('/admin/leaves-categories/{id}','LeaveCategoriesController@show');
=======
// Index
Route::get('/admin/positions','PositionsController@index');
// Create
Route::get('/admin/positions/create','PositionsController@create');
// Show
Route::get('/admin/positions/{position}', 'PositionsController@show');
// Store
Route::post('/admin/positions','PositionsController@store');
// Edit
Route::get('/admin/positions/{position}/edit','PositionsController@edit');
// Update
Route::put('/admin/positions/{position}','PositionsController@update');
// Delete
Route::delete('/admin/positions/{position}','PositionsController@delete');

////////// LEAVE CATEGORIES

// Index
Route::get('/admin/leave_categories','LeaveCategoriesController@index');
// Create
Route::get('/admin/leave_categories/create','LeaveCategoriesController@create');
// Show
Route::get('/admin/leave_categories/{leave_category}', 'LeaveCategoriesController@show');
// Store
Route::post('/admin/leave_categories','LeaveCategoriesController@store');
// Edit
Route::get('/admin/leave_categories/{leave_category}/edit','LeaveCategoriesController@edit');
// Update
Route::put('/admin/leave_categories/{leave_category}','LeaveCategoriesController@update');
// Delete
Route::delete('/admin/leave_categories/{leave_category}','LeaveCategoriesController@delete');

/////////// ANNUAL LEAVES

// Read
Route::get('/admin/leave_annual', 'AnnualLeavesController@index');
// Store or Update
Route::put('/admin/leave_annual/storeOrUpdate', 'AnnualLeavesController@storeOrUpdate');

////////// LEAVE APPLICATIONS

// Index
Route::get('/admin/leave_applications','LeaveApplicationsController@index');
// Create
Route::get('/admin/leave_applications/create','LeaveApplicationsController@create');
// Show
Route::get('/admin/leave_applications/{leave_application}', 'LeaveApplicationsController@show');
// Store
Route::post('/admin/leave_applications','LeaveApplicationsController@store');
// Edit
Route::get('/admin/leave_applications/{leave_application}/edit','LeaveApplicationsController@edit');
// Update
Route::put('/admin/leave_applications/{leave_application}','LeaveApplicationsController@update');
// Delete
Route::delete('/admin/leave_applications/{leave_application}','LeaveApplicationsController@delete');

////////// DEDUCTIBLES

// Index
Route::get('/admin/deductibles', 'DeductiblesController@index');
// Create
Route::get('/admin/deductibles/create', 'DeductiblesController@create');
// Show
Route::get('/admin/deductibles/{deductible}', 'DeductiblesController@show');
// Store
Route::post('/admin/deductibles', 'DeductiblesController@store');
// Edit
Route::get('/admin/deductibles/{deductible}/edit', 'DeductiblesController@edit');
// Update
Route::put('/admin/deductibles/{deductible}', 'DeductiblesController@update');
// Delete
Route::delete('/admin/deductibles/{deductible}', 'DeductiblesController@delete');

////////// DEDUCTIBLE RECORDS

// Read
Route::get('/admin/deductible_records', 'DeductibleRecordsController@index');
// Store
Route::post('/admin/deductible_records/store', 'DeductibleRecordsController@store');
// Edit 
Route::get('/admin/deductible_records/{deductible_record}/edit', 'DeductibleRecordsController@edit'); 
// Update
Route::put('/admin/deductible_records/{deductible_record}', 'DeductibleRecordsController@update'); 

////////// MONTHLY SALARIES OR PAYROLL

// Read
Route::get('/admin/payroll', 'MonthlySalariesController@index');
// Show
Route::get('/admin/payroll/{monthly_salary}', 'MonthlySalariesController@show');
// Store and Update
Route::put('/admin/payroll/storeOrUpdate', 'MonthlySalariesController@storeOrUpdate');
>>>>>>> aa5c42a2b066680a5300f586a5ca2d372e46cbe5
