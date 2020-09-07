<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Create a new task.
     * 
     * @param   Request $request
     * @return  Response
     */
    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
    
        return redirect('/tasks');
    }

    /**
     * Delete Task
     */
    function destroy(Task $task) {
        $task->delete();

        return redirect('/tasks');
    }
}
