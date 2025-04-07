<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
    <link rel="stylesheet" href="{{ asset('css/spacelab.css') }}">

</head>
<body>
        
    @if($projects->isEmpty())
        <p>You are not associated with any projects.</p>
    @else
        <p>Select a Project to take Temporary internaladvisor</p>

        <form action="{{ route('swap-positions') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="project">Choose a project:</label>
            <select name="project_id" id="project">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->projectname }}</option>
                @endforeach
            </select>
            
            <button type="submit">Proceed with Trade</button>
        </form>
    @endif

    </form>
</body>
</html>