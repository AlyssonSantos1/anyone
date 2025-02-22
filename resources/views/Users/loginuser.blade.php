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

    <form action="{{  route('delete-user')  }}" method="get">
        <button type="submit">Delete Review of their user</button>
    </form>

    <form action="{{  route('editing-review') }}" method="get">
    <button type="submit">Edit the Review User</button>
    </form>
    
</body>
</html>