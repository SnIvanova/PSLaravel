<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Detail Page') }}
        </h2>
    </x-slot>

    <div class="my-3 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border rounded-md p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{$project->name}}</h1>
                    <p class="text-gray-600 mb-6">{{$project->description}}</p>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-600"><strong>Language:</strong> {{$project->language}}</p>
                            <p class="text-sm text-gray-600"><strong>State:</strong> {{$project->state}}</p>
                            <p class="text-sm text-gray-600"><strong>Created:</strong> {{$project->created_at->format('M d, Y')}}</p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary ">Edit Project</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-black" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-white border rounded-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ __('Tasks') }}</h2>
                    <button type="button" class="btn btn-success mb-4 text-black " data-bs-toggle="modal" data-bs-target="#createTaskModal">
                        Create Task
                    </button>
                    <ul class="divide-y divide-gray-200">
                        @forelse ($project->tasks as $task)
                            <li class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800">{{$task->name}}</p>
                                    <p class="text-sm text-gray-500">Created at: {{$task->created_at->format('M d, Y')}}</p>
                                </div>
                                <div>
                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-info text-black">Details</a>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 text-gray-600">No tasks found.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <a href="{{ route('projects') }}" class="btn btn-outline-dark mt-6">Back</a>
        </div>
    </div>

    <!-- Create Task Modal -->
    <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="createTaskModalLabel">Create New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="task_name" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name" required>
                            
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="project_id" value="{{$task->project_id}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="task_description" placeholder="Task description" value="{{$task->task_description}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-black">Create Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
