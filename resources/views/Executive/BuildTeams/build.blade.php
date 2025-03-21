<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Team </title>
</head>
<body>
<form action="/built" method="POST">               
    @csrf
    <label for="teammanager_team">Name of the Manager</label>
    <select name="teammanager_team" required>
        <option value="">Select Manager</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
        @endforeach
    </select>
    <br><br><br>
    <label for="numberofmembers_team">Number of Members</label>
    <input type="number" placeholder="Number of members" name="numberofmembers_team" required>
    <br><br><br>
    <label for="projectfocus_team">Focus Of This Project</label>
    <input type="text" placeholder="Project focus" name="projectfocus_team" required>
    <br><br>
    <label for="nameofwriterreview_team">Author</label>
    <input type="text" placeholder="Name of the writer of the review" name="nameofwriterreview_team" required>
    <br><br>
    <label for="members_team">Name of the Associate</label>
    <select name="members[]" required>
    <option value="">Select Associate</option>
    @foreach($associates as $associate)
        <option value="{{ $associate->id }}">{{ $associate->name }}</option>
    @endforeach
    </select>
    <br><br>
    
    
    <button type="submit">Create New Squad</button>
    
</form>
</body>
</html>