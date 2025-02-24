<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
    <h1>You are an Associate</h1>
   

    <form action="{{ route('tradetoadv', ['id' => 4]) }}" method="get">
        <button type="submit">Swap User to Internal Advisor</button>
    </form>
    

    <form action="{{ route('catch-review') }}" method="get">
    <button type="submit">See All reviews</button>
    </form>
    
</body>
</html>