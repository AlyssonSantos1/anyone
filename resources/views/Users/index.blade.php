<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Syndicate</title>

    <link rel="stylesheet" href="{{ asset('css/flatly.users.css') }}">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        p {
            color: #555555;
            font-size: 18px;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #e74c3c; 
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin: 10px;
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
            padding: 20px;
            font-size: 18px;
            border-radius: 10px;
            margin-top: 20px;
        }


        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }

            button {
                width: 80%;
                font-size: 16px;
            }
        }

    </style>
</head>
<body>

    <h1>Welcome to the Syndicate System</h1>
    <p>You are an User</p>

    @if(auth()->check()) 
        <form action="{{ route('getting-review') }}" method="get">
            @csrf
            <button type="submit">Delete Review of your user</button>
        </form>

        <form action="{{ route('editing-review') }}" method="get">
            @csrf
            <button type="submit">Edit your Review</button>
        </form>
    @else
        <div class="alert">
            <p>You need to be logged in to perform this action.</p>
        </div>
    @endif

</body>
</html>
