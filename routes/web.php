<?php

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

////////// HOMEPAGE

Route::get('/', 'HomeController@index');

////////// ADMIN/EMPLOYEE CHANGE PASSWORD

// Edit
Route::get('/password/edit', 'AuthController@edit');
// Update
Route::put('/password/update', 'AuthController@update');

////////// ADMIN LOGIN

// Index
Route::get('/login', 'AuthController@index')->name('login');
// Login 
Route::post('/login', 'AuthController@login');

////////// EMPLOYEE TIME IN/OUT

// Index 
Route::get('/time-entry', 'TimeEntriesController@index');
// Store and Update
Route::put('/time-entry/storeOrUpdate', 'TimeEntriesController@storeOrUpdate');
// Update
Route::put('/time-entry/update', 'TimeEntriesController@update');

Route::middleware('auth')->group(function() { 
	////////// ADMIN LOGOUT

	// Logout
	Route::get('/logout', 'AuthController@logout');

	////////// DASHBOARD

	// Index
	Route::get('/dashboard', 'DashboardController@index');

	////////// DAILY TIME RECORDS

	// Index
	Route::get('/daily_time_records', 'DailyTimeRecordsController@index');
	// Filter
	Route::get('/daily_time_records/filter', 'DailyTimeRecordsController@filter');

	////////// EMPLOYEES

	// Index
	Route::get('/employees','EmployeesController@index');
	// Create
	Route::get('/employees/create','EmployeesController@create');
	// Show
	Route::get('/employees/{employee}', 'EmployeesController@show');
	// Store
	Route::post('/employees','AuthController@store');
	// Edit
	Route::get('/employees/{employee}/edit','EmployeesController@edit');
	// Update
	Route::put('/employees/{employee}','EmployeesController@update');
	// Delete
	Route::get('/employees/{employee}/delete','EmployeesController@delete');

	////////// POSITIONS

	// Index
	Route::get('/positions','PositionsController@index');
	// Create
	Route::get('/positions/create','PositionsController@create');
	// Show
	Route::get('/positions/{position}', 'PositionsController@show');
	// Store
	Route::post('/positions','PositionsController@store');
	// Edit
	Route::get('/positions/{position}/edit','PositionsController@edit');
	// Update
	Route::put('/positions/{position}','PositionsController@update');
	// Delete
	Route::get('/positions/{position}/delete','PositionsController@delete');

	////////// LEAVE CATEGORIES

	// Index
	Route::get('/leave_categories','LeaveCategoriesController@index');
	// Create
	Route::get('/leave_categories/create','LeaveCategoriesController@create');
	// Show
	Route::get('/leave_categories/{leave_category}', 'LeaveCategoriesController@show');
	// Store
	Route::post('/leave_categories','LeaveCategoriesController@store');
	// Edit
	Route::get('/leave_categories/{leave_category}/edit','LeaveCategoriesController@edit');
	// Update
	Route::put('/leave_categories/{leave_category}','LeaveCategoriesController@update');
	// Delete
	Route::get('/leave_categories/{leave_category}/delete','LeaveCategoriesController@delete');

	/////////// ANNUAL LEAVES

	// Read
	Route::get('/leave_annual', 'AnnualLeavesController@index');
	// Filter
	Route::get('/leave_annual/filter', 'AnnualLeavesController@filter');

	////////// LEAVE APPLICATIONS

	// Index
	Route::get('/leave_applications','LeaveApplicationsController@index');
	// Create
	Route::get('/leave_applications/create','LeaveApplicationsController@create');
	// Show
	Route::get('/leave_applications/{leave_application}', 'LeaveApplicationsController@show');
	// Store
	Route::post('/leave_applications','LeaveApplicationsController@store');
	// Edit
	Route::get('/leave_applications/{leave_application}/edit','LeaveApplicationsController@edit');
	// Update
	Route::put('/leave_applications/{leave_application}','LeaveApplicationsController@update');
	// Delete
	Route::get('/leave_applications/{leave_application}/delete','LeaveApplicationsController@delete');

	////////// DEDUCTIBLES

	// Index
	Route::get('/deductibles', 'DeductiblesController@index');
	// Create
	Route::get('/deductibles/create', 'DeductiblesController@create');
	// Show
	Route::get('/deductibles/{deductible}', 'DeductiblesController@show');
	// Store
	Route::post('/deductibles', 'DeductiblesController@store');
	// Edit
	Route::get('/deductibles/{deductible}/edit', 'DeductiblesController@edit');
	// Update
	Route::put('/deductibles/{deductible}', 'DeductiblesController@update');
	// Delete
	Route::get('/deductibles/{deductible}/delete', 'DeductiblesController@delete');

	////////// DEDUCTIBLE RECORDS

	// Read
	Route::get('/deductible_records', 'DeductibleRecordsController@index');
	// Filter
	Route::get('/deductible_records/filter', 'DeductibleRecordsController@filter');
	// Edit 
	Route::get('/deductible_records/{deductible_record}/edit', 'DeductibleRecordsController@edit'); 
	// Update
	Route::put('/deductible_records/{deductible_record}', 'DeductibleRecordsController@update'); 

	////////// MONTHLY SALARIES OR PAYROLL

	// Read
	Route::get('/payroll', 'MonthlySalariesController@index');
	// Filter
	Route::get('/payroll/filter', 'MonthlySalariesController@filter');
	// Show
	Route::get('/payroll/{monthly_salary}', 'MonthlySalariesController@show');
});
