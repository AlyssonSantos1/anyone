<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
    <link rel="stylesheet" href="{{ asset('css/manager.rtl.min.css') }}">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; 
            color: #333; 
            display: flex;
            justify-content: center;
            align-items: flex-start; 
            flex-direction: column;
            height: 100vh;
            text-align: center;
            padding-top: 40px;
        }

        h1 {
            color: #2c3e50; 
            margin-bottom: 20px;
            font-size: 32px; 
        }

        p {
            font-size: 18px;
            color: #555555;
            margin: 10px 0;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            background-color: #3498db; 
            color: white;
            border: none;
            padding: 12px 30px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 250px; 
        }

        button:hover {
            background-color: #2980b9; 
            transform: translateY(-2px);
        }

        button:active {
            background-color: #3498db; 
            transform: translateY(2px);
        }

        .container {
            width: 100%;
            max-width: 600px; 
            margin: 0 auto;
            padding: 20px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>You are a Manager</h1>

        <p>Welcome to the Syndicate System! Please select your actions below:</p>

        <form action="{{ route('temporarytrade') }}" method="get">
            <button type="submit">Swap User to Internal Advisor</button>
        </form>

        <form action="{{ route('manager-all') }}" method="get">
            <button type="submit">See All Reviews</button>
        </form>
    </div>

</body>
</html>
