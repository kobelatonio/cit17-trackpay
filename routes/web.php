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

////////// EMPLOYEE REGISTER

// Register 
Route::get('/register', 'AuthController@register');
// Store 
Route::post('/register', 'AuthController@store');

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
	// Store
	Route::post('/daily_time_records/store', 'DailyTimeRecordsController@store');

	////////// EMPLOYEES

	// Index
	Route::get('/employees','EmployeesController@index');
	// Create
	Route::get('/employees/create','EmployeesController@create');
	// Show
	Route::get('/employees/{employee}', 'EmployeesController@show');
	// Store
	Route::post('/employees','EmployeesController@store');
	// Edit
	Route::get('/employees/{employee}/edit','EmployeesController@edit');
	// Update
	Route::put('/employees/{employee}','EmployeesController@update');
	// Delete
	Route::delete('/employees/{employee}','EmployeesController@delete');

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
	Route::delete('/positions/{position}','PositionsController@delete');

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
	Route::delete('/leave_categories/{leave_category}','LeaveCategoriesController@delete');

	/////////// ANNUAL LEAVES

	// Read
	Route::get('/leave_annual', 'AnnualLeavesController@index');
	// Store or Update
	Route::put('/leave_annual/storeOrUpdate', 'AnnualLeavesController@storeOrUpdate');

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
	Route::delete('/leave_applications/{leave_application}','LeaveApplicationsController@delete');

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
	Route::delete('/deductibles/{deductible}', 'DeductiblesController@delete');

	////////// DEDUCTIBLE RECORDS

	// Read
	Route::get('/deductible_records', 'DeductibleRecordsController@index');
	// Store
	Route::post('/deductible_records/store', 'DeductibleRecordsController@store');
	// Edit 
	Route::get('/deductible_records/{deductible_record}/edit', 'DeductibleRecordsController@edit'); 
	// Update
	Route::put('/deductible_records/{deductible_record}', 'DeductibleRecordsController@update'); 

	////////// MONTHLY SALARIES OR PAYROLL

	// Read
	Route::get('/payroll', 'MonthlySalariesController@index');
	// Show
	Route::get('/payroll/{monthly_salary}', 'MonthlySalariesController@show');
	// Store and Update
	Route::put('/payroll/storeOrUpdate', 'MonthlySalariesController@storeOrUpdate');
});