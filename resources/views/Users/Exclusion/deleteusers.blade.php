<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
</head>
<body>
    <form action="/deleted/{{ $member->id }}" method="POST">
        @csrf
        @method("PUT")            
        <label for=""> Delete Review Yourself</label>
        <input type="text" placeholder="ID" name="id_user" value="{{ old('personalreviews_user', $member->personalreviews) }}" required>
        <br><br><br>
        <button type="submit">Delete</button>
    </form>
    

</body>
</html>