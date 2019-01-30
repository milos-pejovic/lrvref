<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * 
     */
    public function index() {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * 
     */
    public function show(Task $task) {
        return $task;
        // $task = Task::find($id);
        // return view('tasks.show')->with('task',$task);
    }
}
