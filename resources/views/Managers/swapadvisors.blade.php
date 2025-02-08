<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
</head>
<body>
    <form action="{{  route('')  }}" method="POST">
        @csrf
        <label for="">Name </label>
        <input type="text" placeholder="Name" name="name_user">
        <br><br>
        <label for="">Role</label>
        <input type="text" placeholder="Role" name="role_user" >
        <br><br>
        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy" name="hierarchy_user">
        <br><br>
        <label for="">Current Project</label>
        <input type="text" placeholder="CurrentProject" name="currentproject_user">
        <br><br><br>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>