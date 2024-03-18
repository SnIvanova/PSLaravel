<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks Detail Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body my-3">
                            <h1 class="card-title"><strong>Tasks Title: </strong>{{$task->name}}</h1>
                            <p class="card-text"><strong>Description: </strong>{{$task->description}}</p>
                            <p class="card-text"><strong>Created: </strong>{{$task->created_at}}</p>
                        </div>

                        <div class="card-body my-3">
                            <a type="button" class="btn btn-outline-dark d-block" href="{{route('projects')}}">Back</a>
                        </div>
                        <div class="card-footer">
                            <p class="card-text"><small class="text-body-secondary">Last updated {{$task->updated_at}}</small></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>