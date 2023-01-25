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

//array for get
$taskList = [
    'first' => 'Eat',
    'second' => 'Work',
    'third' => 'play'
];

//Route Get, get the $taskArray array
//use method used for getting the global variable outside this get scope
//query string
Route::get('/tasks', function() use($taskList){
    if(request()->search){
        return $taskList[request()->search];
    }else {
        return $taskList;
    }

});

Route::get('/tasks/{param}', function($param) use($taskList){
    return $taskList[$param];
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (){
    return view('test');
});

Route::get('/hello', function(){
    // return response() -> json([
    //     'message' => 'Hello World'
    // ]);
    $dataArray = [
        'message' => 'Hello',
        'Test' => 'Testing'
    ];
    //debugging
    //ddd stands for dump die debug
    return ddd($dataArray);
});

//Route Post, Add some data
Route::post('/tasks/{key}', function($key) use ($taskList){
    //return request()->all();
    $taskList[$key] = request()->task;
    return $taskList;
});

//patch, to modify data
Route::patch('/tasks/{key}', function($key)use($taskList){
    $taskList[$key] = request()->task;
    return $taskList;
});

//delete, to delete data
Route::delete('/tasks/{key}', function($key)use($taskList){
    unset($taskList[$key]);
    return $taskList;
});