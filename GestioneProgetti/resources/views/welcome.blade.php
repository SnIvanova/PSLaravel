@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to our page</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>
        @include('projects.index')
    </div>
@endsection