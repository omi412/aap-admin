<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\FirebaseController;
  
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

Route::get('otp-login', [FirebaseController::class, 'index']);

Auth::routes();

// admin protected routes
//Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //Route::resource('volunteer-types', VolunteerController::class);


    Route::get('volunteer-types', [VolunteerController::class, 'index']);
    Route::post('volunteer-types', [VolunteerController::class, 'store']);
    Route::get('fetch-volunteer-types', [VolunteerController::class, 'fetchvolunteer']);
    Route::get('edit-volunteer-type/{id}', [VolunteerController::class, 'edit']);
    Route::put('update-volunteer-type/{id}', [VolunteerController::class, 'update']);
    Route::delete('delete-volunteer-type/{id}', [VolunteerController::class, 'destroy']);

    /*Route::get('/volunteer-types', function () {
        return view('volunteer_types/volunteer_types');
    });*/

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

    Route::get('/house-data', function () {
        return view('house_data/house_data');
    });

    Route::get('/contacts', function () {
        return view('contacts/contact');
    });

    Route::get('/hierarchy', function () {
        return view('hierarchy/hierarchy');
    });

    Route::get('/pending-approval', function () {
        return view('pending_approval/pending_approval');
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
