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
        <br>
        <label for="">E-mail</label>
        <input type="text" placeholder="Enter your hierarchy" name="email_user" required>
        <br>
        <label for="">Role</label>
        <input type="text" placeholder="Role" name="role_user" required>
        <br>
        <label for="">Hierarchy</label>
        <select name="hierarchy_user" required>
            <option value="executive">Executive</option>
            <option value="manager">Manager</option>
            <option value="internaladvisor">InternalAdvisor</option>
            <option value="associate">Associate</option>
            <option value="user">User</option>
        </select>
        <br>
        <label for="">Inserted Project User</label>
        <input type="text" placeholder="insertedproject" name="insertedproject_user" required>
        <br>
        <label for="">Personal Reviews</label>
        <input type="text" placeholder="personalreviews" name="personalreviews_user" required>
        <br>
        <label for="">Owner of Review</label>
        <input type="text" placeholder="ownerofreview" name="ownerofreview_user" required>
        <br>
        <label for="">Squad</label>
        <input type="text" placeholder="Squadid" name="squad_id" required>
        <br><br>
        <button type="submit">Send</button>
    </form>

    <style>
    body {
        background-color: #e1bee7; /* Cor de fundo suave roxa */
        font-family: Arial, sans-serif;
        color: #333; /* Cor do texto */
    }

    form {
        background-color: #f3e5f5; /* Cor de fundo do formulário roxa suave */
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
        background-color: #8e24aa; /* Cor do botão roxa */
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #7b1fa2; /* Cor do botão ao passar o mouse roxa mais escura */
    }

    ul {
        padding-left: 20px;
    }

    li {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .remove_associate_btn, .remove_project_btn {
        background-color: #d32f2f; /* Cor do botão de remoção */
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
        background-color: #c62828; /* Cor do botão de remoção ao passar o mouse */
    }
</style>

   
</body>
</html>