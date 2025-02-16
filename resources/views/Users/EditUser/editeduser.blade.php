<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Space</title>
</head>
<body>
    <form action="{{  route ('editedbyuser')   }}" method="POST">
        @csrf
        @method("PUT")
        <label for=""> Edit yourself Review</label>
        <input type="text" placeholder="Yourself Reviews" name="personalreviews_user">
        <br><br><br>
        <button type="submit">Edit User</button>
    </form>
</body>
</html>