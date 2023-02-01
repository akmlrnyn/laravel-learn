<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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

    public function store(TaskRequest $request){
    //    $this -> taskList[$request->key] = $request-> task;
    //    return $this -> taskList;
    
    Task::create([
        'task' => $request -> task,
        'user' => $request -> user
    ]);
    return redirect('/tasks');
    }

    //edit method for views
    public function edit($id){
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id){
    //    $this -> taskList[$key] = $request-> task;
    //    return $this -> taskList;
        $task = Task::find($id);
        $task->update([
            'task' => $request -> task,
            'user' => $request -> user,
        ]);
        return redirect('/tasks');
    }

    public function delete(Request $request, $id){
        // unset($this -> taskList[$key]);
        // return $this -> taskList;
        Task::where('id', $id)->delete();
        return redirect('/tasks');
    }

}
