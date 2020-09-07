<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show Task Dashboard
     */
    function index() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Add New Task
     */
    function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
    
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    
        return redirect('/');
    }

    /**
     * Delete Task
     */
    function destroy(Task $task) {
        $task->delete();

        return redirect('/');
    }
}
