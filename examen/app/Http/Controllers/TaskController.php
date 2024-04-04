<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

//      Filter function to filter if you want to see you own tasks else you see all the tasks from all the users
        $filter = $request->input('filter', 'all');

        if ($filter === 'own') {
            $tasks = $user->tasks;
        } else {
            $tasks = Task::all();
        }

        return view('tasks.index', compact('tasks', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_datetime' => $request->input('start_datetime'),
            'end_datetime' => $request->input('end_datetime'),
        ]);

        Auth::user()->tasks()->save($task);

        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->users()->where('user_id', Auth::id())->doesntExist()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        {
            if ($task->users()->where('user_id', Auth::id())->doesntExist()) {
                abort(403);
            }

            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_datetime' => $request->start_datetime,
                'end_datetime' => $request->end_datetime,
            ]);

            return redirect()->route('tasks.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
