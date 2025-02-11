<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
</head>
<body>
    <form action="{{  route ('edited-review')   }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for=""> Edited Review Yourself</label>
        <input type="text" placeholder="Yourself Reviews" name="review_user">
        <br><br><br>
        <button type="submit">Vision</button>
    </form>
    

</body>
</html>