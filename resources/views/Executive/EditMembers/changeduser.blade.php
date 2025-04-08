<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
            max-width: 600px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #f1f1f1; 
            font-size: 16px;
            color: #333;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #ffffff; 
        }

        select {
            appearance: auto; 
            background-color: #f1f1f1;
            color: #333;
        }

        button {
            background-color: #007bff; 
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3; 
        }


        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
        }

        .alert-danger {
            background-color: #f8d7da; 
            color: #721c24; 
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724; 
        }
    </style>
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

    <!-- Edit Member Form -->
    @if(isset($member))
        <form action="{{ route('Done-Deal') }}" method="POST" id="editMemberForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $member->id }}">

            <label for="name_user">Name</label>
            <input type="text" placeholder="Enter your name" name="name_user" value="{{ old('name_user', $member->name) }}" required>

            <label for="email_user">E-mail</label>
            <input type="email" placeholder="Enter your email" name="email_user" value="{{ old('email_user', $member->email) }}" required>

            <label for="hierarchy_user">Hierarchy</label>
            <input type="text" placeholder="Hierarchy" name="hierarchy_user" value="{{ old('hierarchy_user', $member->hierarchy) }}" required>

            <label for="role_user">Role</label>
            <input type="text" placeholder="Role" name="role_user" value="{{ old('role_user', $member->role) }}" required>

            <label for="insertedproject_user">Inserted Project User</label>
            <input type="text" placeholder="Inserted Project" name="insertedproject_user" value="{{ old('insertedproject_user', $member->insertedproject) }}" required>

            <label for="personalreviews_user">Personal Reviews</label>
            <input type="text" placeholder="Personal Reviews" name="personalreviews_user" value="{{ old('personalreviews_user', $member->personalreviews) }}" required>

            <label for="ownerofreview_user">Owner of Review</label>
            <input type="text" placeholder="Owner of Review" name="ownerofreview_user" value="{{ old('ownerofreview_user', $member->ownerofreview) }}" required>

            <button type="submit" id="submitBtn">Update Member</button>
        </form>
    @endif

</body>
</html>
