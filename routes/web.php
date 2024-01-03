<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
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
// Route::get('/',[WebsiteController::class,'home'])->name('home.page');
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {return view('app');})->name('application');

// Route::get('/abc', function () {return view('hello');})->name('hello');
// Route::get('/123', function () {return view('practice');})->name('practice');
Route::post('/save',[StudentController::class,'datastore'])->name('data.store');
Route::get('/getdata',[StudentController::class, 'getdata'])->name('get.data');
Route::get('/editdata/{id}',[StudentController::class, 'editdata'])->name('edit.data');
Route::post('/updatedata/{id}',[StudentController::class, 'updatedata'])->name('update.data');
Route::get('/student_delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

//customer

Route::post('/customer_create',[CustomerController::class,'datasave'])->name('customer.create');
Route::get('/get_customer_data',[CustomerController::class,'customerdata'])->name('customer.getdata');
Route::get('/customer/editdata/{id}',[CustomerController::class, 'edit'])->name('customer_edit.data');
Route::post('/Customer_updatedata/{id}',[CustomerController::class,'update'])->name('customer_update.data');
Route::get('/Customer_delete/{id}',[CustomerController::class,'deletedata'])->name('custome.delete');

//employee
Route::post('/employee_create',[EmployeeController::class,'employee_create'])->name('employee.create');
Route::get('/get_employee_data',[EmployeeController::class,'employee_data'])->name('employee.getdata');
Route::get('/employee/editdata/{id}',[EmployeeController::class, 'emloyee_editdata'])->name('employee_edit.data');
Route::post('/employee_updatedata/{id}',[EmployeeController::class,'employee_update'])->name('employee_update.data');
Route::get('/employee_delete/{id}',[EmployeeController::class,'employee_delete'])->name('employee.delete');