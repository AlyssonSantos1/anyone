<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">
    <style>
        body {
            background-color: #e1bee7;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px; 
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        
        h2 {
            text-align: center;
            color: #8e24aa;
            font-weight: bold;
            font-size: 30px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f1f9; 
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        p.title-description {
            text-align: center;
            font-size: 18px;
            color: #555;
            margin-bottom: 40px;
        }

        form {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        input, select {
            width: 100%;
            max-width: 600px; /* Ajustando a largura dos campos */
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="text"], input[type="email"], input[type="password"] {
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
            color: white;
            padding: 14px;
            width: 100%;
            max-width: 600px; 
            border-radius: 4px;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
        }

        button:hover {
            background-color: #7b1fa2;
        }

        button:active {
            background-color: #6a1b9a;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
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

        .required {
            color: red;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 24px;
            }

            form {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Create New User</h2>
        <p class="title-description">Please fill out the form below to create a new user in the system. All fields are required to ensure accurate user registration.</p>
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/executive" method="POST">
            @csrf

            <div class="form-group">
                <label for="name_user">Name <span class="required">*</span></label>
                <input type="text" placeholder="Enter your name" name="name_user" required>
            </div>

            <div class="form-group">
                <label for="email_user">E-mail <span class="required">*</span></label>
                <input type="email" placeholder="Enter your email" name="email_user" required>
            </div>

            <div class="form-group">
                <label for="password_user">Password <span class="required">*</span></label>
                <input type="password" placeholder="Enter your password" name="password_user" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation_user">Confirm Password <span class="required">*</span></label>
                <input type="password" placeholder="Confirm your password" name="password_confirmation_user" required>
            </div>

            <div class="form-group">
                <label for="role_user">Role <span class="required">*</span></label>
                <input type="text" placeholder="Enter your role" name="role_user" required>
            </div>

            <div class="form-group">
                <label for="hierarchy_user">Hierarchy <span class="required">*</span></label>
                <select name="hierarchy_user" required>
                    <option value="">Select Hierarchy</option>
                    <option value="executive">Executive</option>
                    <option value="manager">Manager</option>
                    <option value="internaladvisor">Internal Advisor</option>
                    <option value="associate">Associate</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="insertedproject_user">Inserted Project <span class="required">*</span></label>
                <input type="text" placeholder="Insert the project" name="insertedproject_user" required>
            </div>

            <div class="form-group">
                <label for="personalreviews_user">Personal Reviews <span class="required">*</span></label>
                <input type="text" placeholder="Enter personal reviews" name="personalreviews_user" required>
            </div>

            <div class="form-group">
                <label for="ownerofreview_user">Owner of Review <span class="required">*</span></label>
                <input type="text" placeholder="Owner of the review" name="ownerofreview_user" required>
            </div>

            <button type="submit">Create User</button>
        </form>
    </div>

</body>
</html>
