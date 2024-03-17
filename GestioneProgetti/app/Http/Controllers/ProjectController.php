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
        //return Project::get();
        //return Auth::user();
        $projects = Project::with('tasks')
                        ->where('user_id', '=', Auth::user()->id)
                        //->paginate(5);
                        ->get();
        //return $projects;
        return view('projects', ['projects' => $projects]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validation and store logic
    }

    public function show(Project $project)
    {
        //return view('project_detail', ['project' => $project]);
        //return $project->load('activities');
        return view('project_detail', ['project' => $project->load('tasks')]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Validation and update logic
    }

    public function destroy(Project $project)
    {
        // Delete logic
    }
}
