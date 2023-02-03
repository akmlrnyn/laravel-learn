<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use GuzzleHttp\Middleware;
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



//Route Get, get the $taskArray array
//use method used for getting the global variable outside this get scope
//query string
Route::get('/tasks', [TaskController::class, 'index'])->middleware('is_admin');
Route::get('/', [HomeController::class, 'index']);

//create function, for views
Route::get('/tasks/create',[TaskController::class, 'create']);


Route::get('/tasks/{id}', [TaskController::class, 'show']);
// //Route Post, Add some data
Route::post('/tasks', [TaskController::class, 'store']);
//update for views
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
// //patch, to modify data
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
// //delete, to delete data
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);

// Route::get('/test', function (){
//     return view('test');
// });

// Route::get('/hello', function(){
//     // return response() -> json([
//     //     'message' => 'Hello World'
//     // ]);
//     $dataArray = [
//         'message' => 'Hello',
//         'Test' => 'Testing'
//     ];
//     //debugging
//     //ddd stands for dump die debug
//     return ddd($dataArray);
// });





