<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
</head>
<body>
    <h1>Welcome to the Syndicate System </h1>
    <p><strong>Your Review:</strong></p>
    <form action="{{ route('delete-review', ['id' => $member->id]) }}" method="POST">
    @csrf
    @method('POST')
    <input type="text" id="personalreviews" name="personalreviews" value="{{ old('personalreviews', $member->personalreviews) }}" required>
    <br><br>
    <button type="submit">Delete Your Review</button>
</form>



</body>
</html>