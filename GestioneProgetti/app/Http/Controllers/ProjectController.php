<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Carbon\Carbon;
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
        $data = $request->only(['name', 'description', 'language']);
        $data['created_at'] = Carbon::now();
        /* $data->user_id = Auth::id(); */
        Project::create($data);
        return redirect('/projects/'.$request->project_id)->with('success', 'Project created successfully!');
        
        
    


    }

    public function show(Project $project)
    {
        //return view('project_detail', ['project' => $project]);
        //return $project->load('task');
        return view('project_detail', ['project' => $project->load('tasks')]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project['name'] = $request->name;
        $project['description'] = $request->description;
        $project['language'] = $request->language;

        $project['updated_at'] = Carbon::now();

        $project->update();
        return redirect('/projects')->with('success', 'Project updated successfully!');

    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project deleted successfully!');
    }
}
