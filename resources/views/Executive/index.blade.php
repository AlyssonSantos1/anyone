<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
    <p>You are an Executive!</p>

    <s>Please Select one option</s>
    
   
    <form action="{{ route('executive.create') }}" method="get">
        <button type="submit">Create New User</button>
    </form>
    <br><br>

    <form action="{{ route('executive.editing') }}" method="get">
    <button type="submit">Edit User</button>
    </form>
    <br><br>

    <form action="{{ route('executive-build') }}" method="get">
    <button type="submit">Build New Project</button>
    </form>
    <br><br>

    <form action="{{ route('executive.review-authors') }}" method="get">
    <button type="submit">See Authors</button>
    </form>
    <br><br>

    <form action="{{ route('team-build') }}" method="get">
        <button type="submit">Create New Squad</button>
    </form>
    <br><br>
   
</body>
</html>