<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project By Executive Only</title>
</head>
<body>
    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif -->
    <form action="/executive-build" method="POST">
        <!-- @csrf
        <label for="">Select the project</label>
        <select name="project" id="project">
            @foreach($project as $project)
            <option value="{{$project->id}}"></option>
            @endforeach
        </select> -->
        
        <label for="">Name of the project </label>
        <input type="text" placeholder="projectname" name="projectname_project" required>
        <br><br>
        <label for="">managerofproject</label>
        <input type="text" placeholder="managername" name="manager_project"  required>
        <br><br>
        <label for="">Numberofmembers</label>
        <input type="text" placeholder="numberofmembers" name="numberofmembers_project" required>
        <br><br>
        <label for="">Goals</label>
        <input type="text" placeholder="goals" name="goals_project" required>
        <br><br>
        <label for="">Description</label>
        <input type="text" placeholder="description" name="description_project" required>
        <br><br>
        <label for="">Reviews</label>
        <input type="text" placeholder="reviews" name="reviews_project" required>
        <br><br>
        <label for="">Reviews Author</label>
        <input type="text" placeholder="authorreview" name="authorreview_project" required>
        <br><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>