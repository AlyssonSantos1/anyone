<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
    <link rel="stylesheet" href="{{ asset('css/users.min.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #7f8c8d;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #e67e22; 
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #d35400; 
            outline: none;
        }

        button {
            background-color: #e67e22; 
            color: white;
            padding: 14px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        button:hover {
            background-color: #d35400; 
            transform: translateY(-2px);
        }

        button:active {
            background-color: #e67e22; 
            transform: translateY(2px);
        }
    </style>
</head>
<body>

    <div>
        <h1>Welcome to the Syndicate System</h1>
        <p><strong>Your Review:</strong></p>

        <form action="{{ route('delete-review', ['id' => $member->id]) }}" method="POST">
            @csrf
            @method('POST')
            <input type="text" id="personalreviews" name="personalreviews" value="{{ old('personalreviews', $member->personalreviews) }}" required>
            <button type="submit">Delete Your Review</button>
        </form>
    </div>

</body>
</html>
