<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request){
        // if($request->search){
        //     return $this -> taskList[$request->search];
        // }
            // return $this -> taskList;
            if($request -> search){
                $task = Task::where('task', 'LIKE', "%$request->search%")->get();//for query string, search directly the task
                return $task;
            }
            $task = Task::paginate(3);
            return view('task.index', [
                'data' => $task
            ]);
        
    }

    //method get, showing the output/read
    public function show($id){
            // return $this -> taskList[$param];
            $task = Task::find($id);
            return $task;
    }

    //method create for views
    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
    //    $this -> taskList[$request->key] = $request-> task;
    //    return $this -> taskList;
    Task::create([
        'task' => $request -> task,
        'user' => $request -> user
    ]);
    return 'success';
    }

    //edit method for views
    public function edit($id){
        return view('task.edit');
    }

    public function update(Request $request, $id){
    //    $this -> taskList[$key] = $request-> task;
    //    return $this -> taskList;
        $task = Task::find($id);
        $task->update([
            'task' => $request -> task,
            'user' => $request -> user,
        ]);
        return $task;
    }

    public function delete(Request $request, $id){
        // unset($this -> taskList[$key]);
        // return $this -> taskList;
        Task::where('id', $id)->delete();
        return 'success to delete';
    }

}
