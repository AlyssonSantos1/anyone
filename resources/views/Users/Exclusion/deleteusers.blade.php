<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
</head>
<body>
    <form action="{{  route ('delete-user')   }}" method="POST">
        @csrf
        @method("PUT")            
        <label for=""> Delete Review Yourself</label>
        <input type="text" placeholder="Yourself Reviews" name="personalreviews_user" >
        <br><br><br>
        <button type="submit">Delete</button>
    </form>
    

</body>
</html>