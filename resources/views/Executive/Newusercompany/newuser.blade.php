<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Screen</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

</head>

<body>  
<form action="/executive" method="POST">
        @csrf

        <label for="name_user">Name</label>
        <input type="text" placeholder="Enter your name" name="name_user" required>

        <label for="email_user">E-mail</label>
        <input type="email" placeholder="Enter your email" name="email_user" required>

        <label for="password_user">Password</label>
        <input type="password" placeholder="Enter your password" name="password_user" required>

        <label for="password_confirmation_user">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" name="password_confirmation_user" required>

        <label for="role_user">Role</label>
        <input type="text" placeholder="Enter your role" name="role_user" required>

        <label for="hierarchy_user">Hierarchy</label>
        <select name="hierarchy_user" required>
            <option value="">Select Hierarchy</option>
            <option value="executive">Executive</option>
            <option value="manager">Manager</option>
            <option value="internaladvisor">InternalAdvisor</option>
            <option value="associate">Associate</option>
            <option value="user">User</option>
        </select>

       =
        <label for="insertedproject_user">Inserted Project</label>
        <input type="text" placeholder="Insert the project" name="insertedproject_user" required>

        <label for="personalreviews_user">Personal Reviews</label>
        <input type="text" placeholder="Enter personal reviews" name="personalreviews_user" required>

       
        <label for="ownerofreview_user">Owner of Review</label>
        <input type="text" placeholder="Owner of the review" name="ownerofreview_user" required>

     
        <button type="submit">Create User</button>
    </form>

    <style>
    body {
        background-color: #e1bee7;
        font-family: Arial, sans-serif;
        color: #333;
    }

    form {
        background-color: #f3e5f5;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 60%;
        margin: auto;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
        color: #333;
    }

    input, select, button {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="text"] {
        color: #555;
    }

    select {
        color: #555;
        background-color: #fff;
    }

    button {
        background-color: #8e24aa; 
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #7b1fa2;
    }

    ul {
        padding-left: 20px;
    }

    li {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .remove_associate_btn, .remove_project_btn {
        background-color: #d32f2f;
        color: white;
        border: none;
        padding: 4px 8px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        border-radius: 4px;
        margin-left: 10px;
    }

    .remove_associate_btn:hover, .remove_project_btn:hover {
        background-color: #c62828; 
    }
</style>

   
</body>
</html>