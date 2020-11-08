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
// Index of Employee Time In/Out
Route::get('/time-entry', 'TimeEntriesController@index');

// Store and Update of Daily Time Records
Route::put('/time-entry/storeOrUpdate', 'TimeEntriesController@storeOrUpdate');

// Update of Daily Time Records
Route::put('/time-entry/update', 'TimeEntriesController@update');

Route::get('/admin/home', 'HomeController@index');

// Read of Daily Time Records
Route::any('/admin/dtr', 'DailyTimeRecordsController@index');

// Store of Daily Time Records
Route::put('/admin/dtr/store', 'DailyTimeRecordsController@store');

Route::get('/admin/employees', function () {
    return view('employees');
});

Route::get('/admin/positions', function () {
    return view('positions');
});

Route::get('/admin/leaves-categories', function () {
    return view('leaves-categories');
});

// Read of Annual Leaves
Route::get('/admin/leaves-annual', 'AnnualLeavesController@index');

// Store or Update of Annual Leaves
Route::put('/admin/leaves-annual/storeOrUpdate', 'AnnualLeavesController@storeOrUpdate');

Route::get('/admin/leaves-applications', function () {
    return view('leaves-applications');
});

Route::get('/admin/deductibles', function () {
    return view('deductibles');
});

// Read of Deductible Records
Route::get('/admin/deductible-records', 'DeductibleRecordsController@index');

// Store of Deductible Records
Route::put('/admin/deductible-records/store', 'DeductibleRecordsController@store');

// Edit of Deductible Records 
Route::get('/admin/deductible-records/{date}/{employee}/{deductible}/edit', 'DeductibleRecordsController@edit'); 

// Update of Deductible Records
Route::put('/admin/deductible-records/{date}/{employee}/{deductible}', 'DeductibleRecordsController@update'); 

// Read of Monthly Salaries
Route::get('/admin/payroll', 'MonthlySalariesController@index');

// Show of Monthly Salaries
Route::get('/admin/payroll/{date}/{employee}', 'MonthlySalariesController@show');

// Store and Update of Monthly Salaries
Route::put('/admin/payroll/storeOrUpdate', 'MonthlySalariesController@storeOrUpdate');

Route::get('/admin/login', function () {
    return view('login-admin');
});