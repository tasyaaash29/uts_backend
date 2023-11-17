<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    //method get
Route::get('/employees',[EmployeesController::class, 'index']);

//method show
Route::get('/employees/{id}', [EmployeesController::class, 'show']);

//method post
Route::post('/employees', [EmployeesController::class, 'store']);

//method put
Route::put('/employees/{id}', [EmployeesController::class, 'update']);

//method delete
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy']);

//method search
Route::get('/employees/search/{name}', [EmployeesController::class, 'search']);

//method active
Route::get('/employees/status/active', [EmployeesController::class, 'active']);

//method inactive
Route::get('/employees/status/inactive', [EmployeesController::class, 'inactive']);

//method terminated
Route::get('/employees/status', [EmployeesController::class, 'terminated']);


