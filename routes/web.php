<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/status/{id}', [App\Http\Controllers\HomeController::class, 'status'])->name('status');
// status
Route::redirect('/', '/login');
// Route::redirect('/home', '/admin');
Auth::routes();

Route::get('/admin_dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->middleware('role:admin')->name('admin.dashboard');
Route::get('/user_dashboard', [App\Http\Controllers\HomeController::class, 'user'])->middleware('role:user')->name('user.dashboard');

// Route::get('/admin_dashboard', 'Admin\DashboardController@index')->middleware('role:admin');
// Route::get('/seller_dashboard', 'Seller\DashboardController@index')->middleware('role:seller');

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
//     Route::get('/', 'HomeController@index')->name('home');
//     // Permissions
//     Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
//     Route::resource('permissions', 'PermissionsController');

//     // Roles
//     Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
//     Route::resource('roles', 'RolesController');

//     // Users
//     Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
//     Route::resource('users', 'UsersController');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
