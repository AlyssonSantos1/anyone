<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
</head>
<body>
    <form action="{{  route  ('tradetoadvisor',$member->id )  }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for="">Name </label>
        <input type="text" placeholder="Name"  value="{{ old('name_user', $member->name) }}" required>
        <br><br>
        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy"  value="{{ old('hiearchy_user', $member->hiearchy) }}" required>
        <br><br>
        <label for="">Current Role</label>
        <input type="text" placeholder="current role"  value="{{ old('role_user', $member->role) }}" required>
        <br><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>