<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Space</title>
    <link rel="stylesheet" href="{{ asset('css/users.min.css') }}">

    <style>
        body {
            font-family: 'Roboto', sans-serif; 
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff; 
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 10px;
            display: block;
            text-align: left;
            margin-left: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #3498db; 
            outline: none;
        }

        button {
            background-color: #e74c3c; 
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #e74c3c;
            transform: translateY(2px);
        }

        .alert {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 8px;
        }

    </style>
</head>
<body>

    <form action="/edited/{{ $member->id }}" method="POST">
        @csrf
        @method("PUT")
        <h2>Edit User Information</h2>

        <label for="personalreviews">Personal Reviews</label>
        <input type="text" id="personalreviews" name="personalreviews" value="{{ old('personalreviews', $member->personalreviews) }}" required>

        <button type="submit">Edit User</button>
    </form>

</body>
</html>
