<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisors.css') }}">

</head>
<body>
<h1>Welcome to the Syndicate System</h1>
<p>You are an internal Advisor</p>

    @if(session('user_id'))
        <form action="{{ route('vision') }}" method="get">
            <label for="projectreviews">Choose a Project to View:</label>
            <select name="project_id" id="project" onchange="this.form.submit()">
                <option value="">Select a Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project['id'] }}" {{ request('project_id') == $project['id'] ? 'selected' : '' }}>
                        {{ $project['projectname'] }}
                    </option>
                @endforeach
            </select>
        </form>

        @if($selectedProject = \App\Models\Project::find(request('project_id')))
            @if($selectedProject->projectreviews)
                <h3>Review for {{ $selectedProject->projectname }}:</h3>
                <p>{{ $selectedProject->projectreviews }}</p>
            @else
                <p>No review found for this project.</p>
            @endif
        @endif
    @else
        <p>You need to be logged in to view this information.</p>
    @endif


</body>
</html>