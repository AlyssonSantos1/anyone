<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisors.css') }}">
</head>
<body>
    <form action="{{ route('gived') }}" method="post">
        @csrf
        <label for="projectreviews">Choose a Project to Review:</label>
        <select name="project_id" id="project">
            @foreach($projects as $project)
            <option value="{{ $project['id'] }}">{{ $project['projectname'] }}</option>
            @endforeach
        </select>
        <label for="projectreviews">Your Review:</label>
        <textarea id="projectreviews" name="projectreviews" required placeholder="Write the Review Here"></textarea>
        <br><br>
        <button type="submit">Submit Project Review</button>
    </form>

</body>
</html>