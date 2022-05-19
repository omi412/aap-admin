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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// admin protected routes
//Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/volunteer-types', function () {
        return view('volunteer_types/volunteer_types');
    });
    Route::get('/task-status', function () {
        return view('task_status/task_status');
    });
    Route::get('/update-task-status', function () {
        return view('update_task_status/update_task_status');
    });
    Route::get('/add-assign', function () {
        return view('add_assign/add_assign');
    });
    Route::get('/messaging', function () {
        return view('messaging/messaging');
    });
//});

// user protected routes
Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::get('/update-task-status', function () {
        return view('update_task_status/update_task_status');
    });
    Route::get('/add-assign', function () {
        return view('add_assign/add_assign');
    });
    Route::get('/messaging', function () {
        return view('messaging/messaging');
    });
});
