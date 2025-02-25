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
        <label for="">Name of the Manager </label>
        <input type="text" placeholder="teammanager" name="teammanager_team" required>
        <br><br>
        <label for="">Numberofmembers</label>
        <input type="text" placeholder="numberofmembers" name="numberofmembers_team" required>
        <br><br>
        <label for="">Focus Of this Project</label>
        <input type="text" placeholder="projectfocus" name="projectfocus_team" required>
        <br><br>
        <label for="">Reviews</label>
        <input type="text" placeholder="reviewsofsquad" name="reviewsofsquad_team" required>
        <br><br>
        <label for="">Author</label>
        <input type="text" placeholder="nameofwriterreview" name="nameofwriterreview_team" required>
        <br><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>