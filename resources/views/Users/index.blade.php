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

    @if(auth()->check()) 
    <form action="{{ route('getting-review') }}" method="get">
        @csrf
        <button type="submit">Delete Review of your user</button>
    </form>

    <form action="{{ route('editing-review') }}" method="get">
        @csrf
        <button type="submit">Edit your Review</button>
    </form>
@else
    <p>You need to be logged in to perform this action.</p>
@endif
</body>
</html>