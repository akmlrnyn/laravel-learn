<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
   //array for get
    private $taskList = [
    'first' => 'Eat',
    'second' => 'Work',
    'third' => 'play'
];

    public function index(Request $request){
        if($request->search){
            return $this -> taskList[$request->search];
        }else {
            return $this -> taskList;
        }
    }

    //method get, showing the output/read
    public function show($param){
            return $this -> taskList[$param];
    }

    public function store(Request $request){
       $this -> taskList[$request->key] = $request-> task;
       return $this -> taskList;
    }

    public function update(Request $request, $key){
       $this -> taskList[$key] = $request-> task;
       return $this -> taskList;
    }

    public function delete(Request $request, $key){
        unset($this -> taskList[$key]);
        return $this -> taskList;
    }
}
