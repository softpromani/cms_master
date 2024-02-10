<?php

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('login');})->name('login');
Route::get('create-password',[UserController::class,'create_password'])->name('create.password');
Route::post('update-password',[UserController::class,'update_password'])->name('update.password');

Route::get('user-list',[UserController::class,'user_list'])->name('user.list');

Route::get('portals-user-role/{portal_id}/{user_id}',[PortalController::class,'portal_role'])->name('portals.user.role');

Route::get('user-dashboard',[UserController::class,'user_dashboard'])->name('user.dashboard');
Route::get('/admin', function () {return view('welcome');})->name('admin.dashboard');
Route::get('role',[RoleController::class,'role'])->name('role');
Route::get('user',[UserController::class,'index'])->name('create.user');
Route::post('register-user',[UserController::class,'store'])->name('register.user');
Route::post('role-permissions',[RoleController::class,'role_permissions'])->name('role.permissions');
Route::get('permission',[PermissionsController::class,'permission'])->name('permission');
Route::post('create-permission',[PermissionsController::class,'create_permission'])->name('create.permission');
Route::post('auth-user',[UserController::class,'auth_user'])->name('auth.user');
Route::get('logout',[UserController::class,'logout'])->name('logout.user');
Route::get('portal',[PortalController::class,'index'])->name('portal');
Route::post('portal-store',[PortalController::class,'store'])->name('portal.store');
Route::get('manage-portal',[PortalController::class,'manage_portal'])->name('portal.manage');
