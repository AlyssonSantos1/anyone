<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Space</title>
</head>
<body>
    <form action="{{  route ('edited-review')   }}" method="POST">
        @csrf
        @method("PUT")
        <label for=""> Review made by yourself</label>
        <input type="text" placeholder="Yourself Reviews" name="review_user">
        <br><br><br>
        <button type="submit">Edit User</button>
    </form>
</body>
</html>