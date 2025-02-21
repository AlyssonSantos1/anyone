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
        <button type="submit">Create New User</button>
    </form>

    <form action="{{ route('executive.editing', ['id' => 1]) }}" method="get">
    <button type="submit">Edit User</button>
    </form>

    <form action="{{ route('executive.project-build') }}" method="get">
    <button type="submit">Build New Project</button>
    </form>

    <form action="{{ route('executive.review-authors', ['squad_id' => 1]) }}" method="get">
    <button type="submit">See Authors</button>
    </form>
   
</body>
</html>
