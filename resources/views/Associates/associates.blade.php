<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associates Area</title>
</head>
<body>
    <form action="{{  route('')  }}" method="POST">
        @csrf
        <label for="">Reviews of Team Project</label>
        <input type="text" placeholder="ReviewsofProject" name="projectreviews_project" >
        <br><br>
        
        <button type="submit">See</button>
    </form>
</body>
</html>