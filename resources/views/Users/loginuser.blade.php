<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Syndicate</title>
</head>
<body>
    <h1>Welcome to the Syndicate System </h1>
    <p>You are an User </p>

    @if(session('user_id'))
    <form action="{{ route('getting-review', ['id' => session('user_id')]) }}" method="get">
        <button type="submit">Delete Review of their user</button>
    </form>

    <form action="{{ route('editing-review', ['id' => session('user_id')]) }}" method="get">
    <button type="submit">Edit the Review User</button>
    </form>
    @else
    <p>You need to be logged in to perform this action.</p>
    @endif
    
</body>
</html>