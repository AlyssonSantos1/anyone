<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
<body>

    <form action="{{ route('executive.editing') }}" method="get" id="memberForm">
        @csrf
        <label for="member">Select Member to Edit:</label>
        <select name="id" id="member" required onchange="this.form.submit()">
            <option value="">Select a member</option>
            @foreach ($members as $memberOption)
                <option value="{{ $memberOption->id }}" 
                    {{ old('id', request()->id) == $memberOption->id ? 'selected' : '' }}>
                    {{ $memberOption->name }}
                </option>
            @endforeach
        </select>
    </form>
    @if(isset($member))
    <form action="{{ route('Done-Deal') }}" method="POST" id="editMemberForm">
        @csrf
        @method('PUT') <!-- A rota está configurada para aceitar PUT -->
        <input type="hidden" name="id" value="{{ $member->id }}">

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
        <label for="">Owner of Review</label>
        <input type="text" placeholder="Owner of Review" name="ownerofreview_user" value="{{ old('ownerofreview_user', $member->ownerofreview) }}" required>
        <br><br>
        <button type="submit" id="submitBtn">Update Member</button>
    </form>
@endif


</body>
</html>