<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Space</title>
</head>
<body>
    <form action="/edited/{{ $member->id }}" method="POST">
    @csrf
    @method("PUT")
    <label for="personalreviews">Personal Reviews</label>
    <input type="text" id="personalreviews" name="personalreviews" value="{{ old('personalreviews', $member->personalreviews) }}" required>
    <br><br><br>
    <button type="submit">Edit User</button>
</form>

</body>
</html>