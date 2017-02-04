<?php

namespace App\Http\Controllers;

//insert all what we needs
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use \App\Task;


class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks = Task::getTasks(Auth::user()->id);
        //send data to view
        return view('tasks.taskList', compact('tasks'));
    }
    
    public function open($itemId)
    {
        $task = ($itemId != null) ? \App\Task::find($itemId) : '';
        //set view
        return view('tasks.taskOpen' , compact('task'));
    }
    
    public function edit($itemId = null)
    {
        //check if item was isset
        $task = ($itemId != null) ? \App\Task::find($itemId) : new Task;

        //if item is given its means that its  gone be edit task, so send to view task data
        return view('tasks.editForm', compact('task'));
    }
    
    public function storeTask(Request $request)
    {
        //get request and validate data
        $this->validate($request, [
            'title' => 'required|:tasks|max:255',
            'content' => 'required',
        ],[
            'title.required' => 'Title is required!',
            'title.unique' => 'You already have that task!',
            'content.required' => 'Content is required!',
        ]);
        
        Task::insertOrUpdate($request, Auth::user()->id);
       
        //after all is good, redirect to tasks view with success message
        return redirect('tasks')->with('status', 'Success!');;
    }
    
    public function setDoneStatus($itemId = null)
    {
        //check if item was isset and set done status to 1
        if($itemId != null) $task = DB::table('tasks')
                                    ->where('id', $itemId)
                                    ->update(['done' => 1]);
        
        return back();
    }
    
    public function republishItem($itemId = null)
    {
        //check if item was isset and set done back to 0
        if($itemId != null) $task = DB::table('tasks')
                                    ->where('id', $itemId)
                                    ->update(['done' => 0]);
        
        return back();
    }
    
    public function deleteTask($itemId = null)
    {
        //check if item was isset and set done back to 0
        if($itemId != null) $task = DB::table('tasks')
                                    ->where('id', $itemId)
                                    ->update(['deleted_at' => date('Y-m-d H:i:s')]);
        
        return back();
    }
    
    public function getTop5Users()
    {
        //check if item was isset and set done back to 0
        if($itemId != null) $task = DB::table('tasks')
                                    ->where('id', $itemId)
                                    ->update(['done' => 0]);
        
        return back();
    }
}
