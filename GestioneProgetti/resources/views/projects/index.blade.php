<div class="mt-4">
    <h2>Projects</h2>
    <ul class="list-group">
        @foreach($projects as $project)
            <li class="list-group-item">
                <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
