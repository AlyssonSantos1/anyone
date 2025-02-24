<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade to Internal Advisor temporary</title>
</head>
<body>
    <form action="/trade/{{ $member->id }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for="">Name </label>
        <input type="text" placeholder="Name" name="name_user" value="{{ old('name_user', $member->name) }}" required>
        <br><br>

        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy"  name="hierarchy_user" value="{{ old('hierarchy_user', $member->hierarchy) }}" required>
        <br><br>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>