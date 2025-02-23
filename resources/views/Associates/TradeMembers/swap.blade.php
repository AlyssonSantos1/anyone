<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
</head>
<body>
    <form action="/traded/{{ $member->id }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for="">Name </label>
        <input type="text" placeholder="Name" name="name_user" value="{{ old('name_user', $member->name) }}" required>
        <br><br>

        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy"  name="hierarchy_user" value="{{ old('currentproject_user', $member->currentproject) }}" required>
        <br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>