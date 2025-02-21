<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
    <p>You are an Executive!</p>

   
    <form action="{{ route('executive.create') }}" method="get">
        <button type="submit">Create New Executive</button>
    </form>

    <form action="{{ route('executive.editing', ['id' =>1]) }}" method="get">
        <button type="submit">Edit Executive</button>
    </form>

    <form action="{{ route('executive.building') }}" method="get">
        <button type="submit">Build New Project</button>
    </form>

    <form action="{{ route('executive.review',['id' =>1]) }}" method="get">
        <button type="submit">Review Authors</button>
    </form>

    <form action="{{ route('created') }}" method="post">
        @csrf
        <button type="submit">Confirm Executive Creation</button>
    </form>
</body>
</html>
