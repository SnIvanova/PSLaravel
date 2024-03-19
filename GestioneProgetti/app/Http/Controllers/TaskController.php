<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'TaskController index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreTaskRequest $request)
    {
        return view('create_task', ['project_id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->only(['title', 'task_description',  'project_id']);
        $data['created_at'] = Carbon::now();

        Task::create($data);
        return redirect('/projects/'.$request->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task_detail', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit_task', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task['title'] = $request->title;
        $task['description'] = $request->description;
        $task['updated_at'] = Carbon::now();

        $task->update();
        return redirect('/projects/'.$request->project_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/projects/'.$task->project_id);
    }
}
