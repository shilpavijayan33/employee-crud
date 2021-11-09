<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::get('hello', function () {
//     dd("dfd");
//     return view('employee.index');
// });


// Route::middleware(['auth'])->group(function () {

    Route::get('users',[EmployeeController::class,'index']);

    Route::resource('users', EmployeeController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'show' => 'users.show',
        'store' => 'users.store',
        'update' => 'users.update',
        // 'destroy' => 'users.destroy',
    ]);

    Route::get('delete-user/{id}',[EmployeeController::class,'deleteUser']);
// });

require __DIR__.'/auth.php';
