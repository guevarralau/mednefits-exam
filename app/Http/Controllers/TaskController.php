<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('tasks')->withTasks(auth()->user()->tasks);
    }
    public function create() {
        return view('createtask');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

           $task = new Task;
           $task->user_id = auth()->id();
           $task->name = $data['name'];
           $task->save();
           session()->flash('status', 'Task successfully created');
           return redirect()->route('task.index');
    }

    public function show(Task $task)
    {
        if($task->user_id != auth()->id()){
            abort(403,'You are not allowed to view other users task');
        }
        return view('task')->withTask($task);
    }


    public function edit(Task $task)
    {
        //
        if($task->user_id != auth()->id()){
            abort(403,'You are not allowed in this page');
        }
        return view('updatetask')->withTask($task);
    }

    public function update(UpdateRequest $request, Task $task)
    {
        if($task->user_id != auth()->id()){
            abort(403,'You cannot update another users task');
        }
        $data = $request->validated();
        $task->update(['name' => $data['name']]);
        session()->flash('status', 'Task successfully updated');
        return redirect()->route('task.index');
    }

    public function destroy(Task $task)
    {
        if($task->user_id != auth()->id()){
            abort(403,'You cannot delete another users task');
        }
        $task->delete();
        session()->flash('status', 'Task deleted');
        return redirect()->back();
    }
}
