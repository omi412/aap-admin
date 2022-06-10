<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UpdateTaskStatusController;
use App\Http\Controllers\addAssignController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\HouseDataController;
use App\Http\Controllers\PendingApprovalController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleDetailController;
use App\Http\Controllers\HomeController;
 

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

Route::get('/direct-login', function () {
    $user = App\Models\User::find(1);
    Auth::login($user);
    return redirect('dashboard');
});

Route::get('otp-login', [FirebaseController::class, 'index']);
Route::post('check-mobile-no', [HomeController::class, 'checkMobileNo'])->name('check-mobile-no');
Route::post('signup', [HomeController::class, 'signup'])->name('signup');

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

    Route::get('task-status', [TaskStatusController::class, 'index']);
    Route::post('task-status', [TaskStatusController::class, 'store']);
    Route::get('fetch-task-status', [TaskStatusController::class, 'fetchtaskstatus']);
    Route::get('edit-task-status/{id}', [TaskStatusController::class, 'edit']);
    Route::put('update-task-status/{id}', [TaskStatusController::class, 'update']);
    Route::delete('delete-task-status/{id}', [TaskStatusController::class, 'destroy']);


    Route::get('update-task-status', [UpdateTaskStatusController::class, 'index']);
    Route::post('update-task-status', [UpdateTaskStatusController::class, 'store']);
    Route::get('fetch-update-task-status', [UpdateTaskStatusController::class, 'fetchtaskstatus']);
    Route::get('edit-update-task-status/{id}', [UpdateTaskStatusController::class, 'edit']);
    Route::put('update-update-task-status/{id}', [UpdateTaskStatusController::class, 'update']);
    Route::delete('delete-update-task-status/{id}', [UpdateTaskStatusController::class, 'destroy']);

    Route::get('add-assign', [addAssignController::class, 'index']);
    Route::post('add-assign', [addAssignController::class, 'store']);
    Route::get('fetch-add-assign', [addAssignController::class, 'fetchtaskstatus']);
    Route::get('edit-assign/{id}', [addAssignController::class, 'edit']);
    Route::put('update-add-assign/{id}', [addAssignController::class, 'update']);
    Route::delete('delete-add-assign/{id}', [addAssignController::class, 'destroy']);

    Route::resource('messaging', MessagingController::class);
    Route::get('fetch-messaging', [MessagingController::class, 'fetchMessages']);
    Route::get('edit-messaging/{id}', [MessagingController::class, 'edit']);

    Route::resource('house-data', HouseDataController::class);
    Route::post('update-house-data/{id}', [HouseDataController::class,'update']);
    Route::delete('delete-house-data/{id}', [HouseDataController::class, 'destroy']);


    Route::resource('users', PendingApprovalController::class);
    Route::post('users', [PendingApprovalController::class, 'store']);
    Route::get('edit-user/{id}', [PendingApprovalController::class, 'edit']);
    Route::post('update-user/{id}', [PendingApprovalController::class,'update']);
    Route::delete('delete-user/{id}', [PendingApprovalController::class, 'destroy']);


    Route::resource('pending-approval', PendingApprovalController::class);
    Route::post('pending-approval', [PendingApprovalController::class, 'store']);
    Route::get('edit-pending-approval/{id}', [PendingApprovalController::class, 'edit']);
    Route::post('update-pending-approval/{id}', [PendingApprovalController::class,'update']);
    Route::delete('delete-pending-approval/{id}', [PendingApprovalController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role-details', RoleDetailController::class);

    Route::get('get-wards/{mandal_id}', [PendingApprovalController::class, 'getWards']);
    Route::get('get-booths/{ward_id}', [PendingApprovalController::class, 'getBooths']);
    Route::get('get-galies/{booth_id}', [PendingApprovalController::class, 'getGali']);

    //Route::get('get-volunteers/{volunteer_id}', [TaskStatusController::class, 'getVolunteers']);
    Route::get('get-wards/{volunteer_id}', [TaskStatusController::class, 'getVolunteers']);

    /*Route::get('/volunteer-types', function () {
        return view('volunteer_types/volunteer_types');
    });*/

   /* Route::get('/task-status', function () {
        return view('task_status/task_status');
    });*/
   /* Route::get('/update-task-status', function () {
        return view('update_task_status/update_task_status');
    });*/
    /*Route::get('/add-assign', function () {
        return view('add_assign/add_assign');
    });*/

    /*Route::get('/messaging', function () {
        return view('messaging/messaging');
    });*/

    // Route::get('/house-data', function () {
    //     return view('house_data/house_data');
    // });

    Route::get('/contacts', function () {
        return view('contacts/contact');
    });

    Route::get('/hierarchy', function () {
        return view('hierarchy/hierarchy');
    });

    /*Route::get('/pending-approval', function () {
        return view('pending_approval/pending_approval');
    });*/

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
