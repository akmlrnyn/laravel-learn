<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
   //array for get
    private $taskList = [
    'first' => 'Eat',
    'second' => 'Work',
    'third' => 'play'
];

    public function index(Request $request){
        // if($request->search){
        //     return $this -> taskList[$request->search];
        // }
            // return $this -> taskList;
            if($request -> search){
                $task = DB::table('tasks')->where('task', 'LIKE', "%$request->search%")->get();
                return $task;
            }
            $task = DB::table('tasks')->get();
            return $task;
        
    }

    //method get, showing the output/read
    public function show($id){
            // return $this -> taskList[$param];
            $task = DB::table('tasks')->where('id', $id)->get();
            return $task;
    }

    public function store(Request $request){
    //    $this -> taskList[$request->key] = $request-> task;
    //    return $this -> taskList;
    DB::table('tasks')->insert([
        'task' => $request -> task,
        'user' => $request -> user
    ]);
    return 'success';
    }

    public function update(Request $request, $id){
    //    $this -> taskList[$key] = $request-> task;
    //    return $this -> taskList;
        DB::table('tasks')->where('id', $id)->update([
            'task' => $request -> task,
            'user' => $request -> user,
        ]);
        return 'Success';
    }

    public function delete(Request $request, $id){
        // unset($this -> taskList[$key]);
        // return $this -> taskList;
        DB::table('tasks')->where('id', $id)->delete();
        return 'success to delete';
    }
}
