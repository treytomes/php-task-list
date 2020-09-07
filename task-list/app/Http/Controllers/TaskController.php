<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     * 
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     * 
     * @param   TaskRepository  $tasks
     * @return  void
     */
    public function __construct(TaskRepository $tasks) {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's tasks.
     * 
     * @param   Request $request
     * @return  Response
     */
    function index(Request $request) {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user())
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
