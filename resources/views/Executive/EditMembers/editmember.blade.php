<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
<body>
    
    <form action="{{  route  ('memberedited',  $member->id )  }}" method="POST">
        @csrf
        @method("PUT")
        <label for="">Name </label>
        <input type="text" placeholder="Enter your name" name="name_user" require>
        <br><br>
        <label for="">E-mail</label>
        <input type="text" placeholder="Enter your hierarchy" name="email_user" require>
        <br><br>
        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy" name="hierarchy_user" require>
        <br><br>
        <label for="">Role</label>
        <input type="text" placeholder="Role" name="role_user" require>
        <br><br>
        <label for="">Inserted Project User</label>
        <input type="text" placeholder="insertedproject" name="insertedproject_user"require>
        <br><br>
        <label for="">Personal Reviews</label>
        <input type="text" placeholder="personalreviews" name="personalreviews_user" require>
        <br><br><br>
        <button type="submit">Send</button>
    </form>

    
</body>
</html>