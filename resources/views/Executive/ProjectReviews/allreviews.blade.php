<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Space of Vision</title>
</head>
<body>
    <form action="{{ route('executive.review-authors') }}" method="get">
        <label for="project_id">Select a project</label>
        <select name="project_id" id="project_select" required>
            <option value="">Select a project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->projectname }}</option>
            @endforeach
        </select>
        <button type="submit">See Authors</button>
    </form>

</body>
</html>