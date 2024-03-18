<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Detail Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row g-0">
                        <div class="card-body my-3">
                            <h1 class="card-title"><strong>Project Name: </strong>{{$project->name}}</h1>
                            <p class="card-text"><strong>Description: </strong>{{$project->description}}</p>
                            <p class="card-text"><strong>Language: </strong>{{$project->language}}</p>
                            <p class="card-text"><strong>State: </strong>{{$project->state}}</p>
                            <p class="card-text"><strong>Created: </strong>{{$project->created_at}}</p>
                        </div>
                        <div class="card-body my-3">
                            <h2 class="card-title">{{ __('Tasks') }}</h2>
                            @if(count($project->tasks) > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach ($project->tasks as $task)
                                        <li class="list-group-item">
                                            {{$task->name}}
                                            <span class="float-end">
                                                <a type="button" class="btn btn-outline-info" href="{{ route('tasks.show', $task->id) }}">
                                                    <i class="bi bi-clipboard-check"></i>
                                                </a>
                                            </span>
                                        </li>
                                        
                                    @endforeach
                                    <p class="card-text"><small class="text-body-secondary">Last updated {{$project->updated_at}}</small></p>
                                </ul>
                            @else
                                <p>I don't have any records!</p>
                            @endif
                        </div>
                        <div class="card-body my-3">
                            
                            <a type="button" class="btn btn-outline-primary  mt-2" href="{{route('projects.edit', $project)}}">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger " onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a type="button" class="btn btn-outline-dark " href="{{route('projects')}}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
