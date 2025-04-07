<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
    <link rel="stylesheet" href="{{ asset('css/associates.css') }}">

</head>
<body>
    <p>You are an Associate</p>    
    <p>You are logged</p>

    <form action="{{ route('complete') }}" method="get">
        <button type="submit">Click to See Reviews</button>
    </form>

    <form action="{{ route('tradetoadv') }}" method="get">
        <button type="submit">Swap User to Internal Advisor</button>
    </form>


</body>
</html>