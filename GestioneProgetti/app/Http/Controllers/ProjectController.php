<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{public function welcome()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    public function index()
    {
        $projects = Project::with('tasks')
                        ->where('user_id', '=', Auth::user()->id)
                        //->paginate(5);
                        ->get();
                        return view('projects', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();
        
        $project = new Project();
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->language = $validatedData['language'];
        $project->user_id = Auth::id();
        $project->save();

        return redirect()->route('projects')->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        //return view('project_detail', ['project' => $project]);
        //return $project->load('task');
        return view('project_detail', ['project' => $project->load('tasks')]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();
        
        $project->update($validatedData);
        
        return redirect()->route('projects')->with('success', 'Project updated successfully!');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully!');
    }
}
