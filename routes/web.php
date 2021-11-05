<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'CheckRole:0'])->group(function () {
    //
    Route::get('/profile',  [App\Http\Controllers\EmployeeController::class, 'show'])->name('profile');
    Route::get('profile/edit_person/{id}', [App\Http\Controllers\EmployeeController::class, 'edit_person_info'])->name('profile/edit_person');
    Route::get('profile/edit_related/{id}', [App\Http\Controllers\EmployeeController::class, 'edit_related_info'])->name('profile/edit_related');
    Route::put('profile/edit/update_person_info/{id}', [App\Http\Controllers\EmployeeController::class, 'update_person_info'])->name('profile/edit/update_person_info');
    Route::put('profile/edit/update_related_info/{id}', [App\Http\Controllers\EmployeeController::class, 'update_related_info'])->name('profile/edit/update_related_info');
    Route::get('ask_leave_page', [App\Http\Controllers\LeaveController::class, 'page_ask_leave'])->name('ask_leave_page');
    Route::post('ask_leave_page',  [App\Http\Controllers\LeaveController::class, 'store_leave']);
});

Route::middleware(['auth', 'CheckRole:1'])->group(function () {
    Route::get('/dashboard',  [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/employee',  [App\Http\Controllers\AdminController::class, 'employee'])->name('employee');
    Route::get('/employee/form_add',  [App\Http\Controllers\AdminController::class, 'show_add'])->name('form_add');
    Route::post('employee', [App\Http\Controllers\AdminController::class, 'store_employee']);

    //editemployee
    Route::get('/employee/form_edit/{id}',  [App\Http\Controllers\AdminController::class, 'show_edit'])->name('employee/form_edit');
    Route::put('/employee/form_edit/{id}', [App\Http\Controllers\AdminController::class, 'update_employee']);

    //leave
    Route::get('/leavepage',  [App\Http\Controllers\AdminController::class, 'leave_list'])->name('leavepage');
    Route::put('leavepage/accept/{id}', [App\Http\Controllers\AdminController::class, 'accepted_leave'])->name('leavepage/accept');
    Route::put('leavepage/reject/{id}', [App\Http\Controllers\AdminController::class, 'rejected_leave'])->name('leavepage/reject');

    //status account
    Route::put('employee/deactived_account/{id}', [App\Http\Controllers\AdminController::class, 'deactived_account'])->name('employee/deactived_account');
    Route::put('employee/actived_account/{id}', [App\Http\Controllers\AdminController::class, 'actived_account'])->name('employee/actived_account');
});

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
