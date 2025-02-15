<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project By Executive Only</title>
</head>
<body>
    
    <form action="{{  route('projectcreated')  }}" method="POST">
        @csrf
        <label for="">Select the project</label>
        <select name="project" id="project">
            @foreach($squads as $squad)
            <option value="{{$squad->id}}"></option>
            @endforeach
        </select>
        <br><br>
        
        <label for="">Name of the project </label>
        <input type="text" placeholder="projectname" name="projectname_project" require>
        <br><br>
        <label for="">E-managerofproject</label>
        <input type="text" placeholder="managername" name="managername_project" require>
        <br><br>
        <label for="">Numberofmembers</label>
        <input type="text" placeholder="numberofmembers" name="numberofmembers_project" require>
        <br><br>
        <label for="">Goals</label>
        <input type="text" placeholder="goals" name="goals_project" require>
        <br><br>
        <label for="">Description</label>
        <input type="text" placeholder="description" name="description_project" require>
        <br><br>
        <label for="">Reviews</label>
        <input type="text" placeholder="reviews" name="reviews_project" require>
        <br><br>
        <label for="">Reviews Author</label>
        <input type="text" placeholder="author" name="authorreview_project" require>
        <br><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>