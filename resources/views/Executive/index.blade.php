<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
   
    @if(session('error'))
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('error') }}
        </div>
    @endif

    
    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

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
   
</body>
</html>