<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System </title>
</head>
<body>
<h1>Welcome to the Syndicate System </h1>
    <p>You are an internal Advisor </p>

    @if(session('user_id'))
    <form action="{{ route('giving') }}" method="get">
        <button type="submit">Give Review</button>
    </form>

    <form action="{{ route('vision') }}" method="get">
    <button type="submit">See Project Review</button>
    </form>
    @else
    <p>You need to be logged in to perform this action.</p>
    @endif
    
</body>
</html>