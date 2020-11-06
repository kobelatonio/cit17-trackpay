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

Route::get('/admin/home', function () {
    return view('home');
});

Route::get('/admin/dtr', function () {
    return view('dtr');
});

Route::get('/admin/employees', function () {
    return view('employees');
});

Route::get('/admin/positions', function () {
    return view('positions');
});

Route::get('/admin/leaves-categories', function () {
    return view('leaves-categories');
});

Route::get('/admin/leaves-annual', function () {
    return view('leaves-annual');
});

Route::get('/admin/leaves-applications', function () {
    return view('leaves-applications');
});

Route::get('/admin/deductibles', function () {
    return view('deductibles');
});

Route::get('/admin/deductible-records', function () {
    return view('deductible-records');
});

Route::get('/admin/payroll', function () {
    return view('payroll');
});

Route::get('/employee', function () {
    return view('login-employee');
});

Route::get('/admin/login', function () {
    return view('login-admin');
});