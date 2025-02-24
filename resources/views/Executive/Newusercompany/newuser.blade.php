<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Screen</title>
</head>

<body>   

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="/executives" method="POST">
        @csrf

        <label for="">Name </label>
        <input type="text" placeholder="Enter your name" name="name_user" required>
        <br><br>
        <label for="">E-mail</label>
        <input type="text" placeholder="Enter your hierarchy" name="email_user" required>
        <br><br>
        <label for="">Role</label>
        <input type="text" placeholder="Role" name="role_user" required>
        <br><br>
        <label for="">Hierarchy</label>
        <select name="hierarchy_user" required>
            <option value="executive">Executive</option>
            <option value="manager">Manager</option>
            <option value="internaladvisor">InternalAdvisor</option>
            <option value="associate">Associate</option>
            <option value="user">User</option>
        </select>
        <br><br>
        <label for="">Inserted Project User</label>
        <input type="text" placeholder="insertedproject" name="insertedproject_user" required>
        <br><br>
        <label for="">Personal Reviews</label>
        <input type="text" placeholder="personalreviews" name="personalreviews_user" required>
        <br><br>
        <label for="">Owner of Review</label>
        <input type="text" placeholder="ownerofreview" name="ownerofreview_user" required>
        <br><br>
        <label for="">Squad</label>
        <input type="text" placeholder="Squadid" name="squad_id" required>
        <br><br><br>
        <button type="submit">Send</button>
    </form>
    
   
</body>
</html>