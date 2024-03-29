<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve tasks for the authenticated user
        $tasks = auth()->user()->tasks;
        // Pass tasks to the view
        //return view('tasks.index', ['tasks' => $tasks]);
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // You may have additional logic for creating a new task, e.g., getting data from a model
        // For simplicity, I'm just passing an empty task object to the view
        $task = new Task;

        return view('tasks.create', ['task' => $task]);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Request $request, $id)
    // {
    //     $task = Task::find($id);
    //     Gate::authorize('delete', $task);
    //     $task->delete();
    // }

    // public function onoff(Request $request, $id)
    // {
    //     $task = Task::find($id);

    //     // Check if the task is not null before calling isDone
    //     if ($task) {
    //         // Toggle the isDone value
    //         $task->update(['isDone' => !$task->isDone]);
    //     }

    //     return redirect()->route('tasks.index'); // Adjust the route accordingly
    // }



    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'description' => 'required|string',
    //         'isDone' => 'required|boolean',
    //     ]);

    //     // Create a new task with the provided data
    //     auth()->user()->tasks()->create([
    //         'description' => $request->input('description'),
    //         'isDone' => $request->input('isDone'),
    //     ]);

    //     // Redirect to the tasks index page
    //     return redirect()->route('tasks.index');
    // }
}
