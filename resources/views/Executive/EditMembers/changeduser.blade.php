<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
<body>
    <form action="{{ route('memberedited', $member->id) }}" method="POST">
    @csrf
    @method("PUT")

    <label for="">Name</label>
    <input type="text" placeholder="Enter your name" name="name_user" value="{{ old('name_user', $member->name) }}" required>
    <br><br>

    <label for="">E-mail</label>
    <input type="email" placeholder="Enter your email" name="email_user" value="{{ old('email_user', $member->email) }}" required>
    <br><br>

    <label for="">Hierarchy</label>
    <input type="text" placeholder="Hierarchy" name="hierarchy_user" value="{{ old('hierarchy_user', $member->hierarchy) }}" required>
    <br><br>

    <label for="">Role</label>
    <input type="text" placeholder="Role" name="role_user" value="{{ old('role_user', $member->role) }}" required>
    <br><br>

    <label for="">Inserted Project User</label>
    <input type="text" placeholder="Inserted Project" name="insertedproject_user" value="{{ old('insertedproject_user', $member->insertedproject) }}" required>
    <br><br>

    <label for="">Personal Reviews</label>
    <input type="text" placeholder="Personal Reviews" name="personalreviews_user" value="{{ old('personalreviews_user', $member->personalreviews) }}" required>
    <br><br>

    <label for="">Squad</label>
    <input type="text" placeholder="Squad ID" name="squad_id" value="{{ old('squad_id', $member->squad_id) }}" required>
    <br><br><br>

    <button type="submit">Send</button>
</form>


    
</body>
</html>