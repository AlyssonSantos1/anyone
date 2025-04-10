<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisor.rtl.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4; /* Cor de fundo cinza claro */
        }

        .container {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 15px;
            color: #2c3e50; /* Cor de texto escuro */
            font-weight: 600;
        }

        p {
            font-size: 18px;
            color: #7f8c8d; /* Cinza médio para o texto */
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button {
            background-color: #e67e22; /* Laranja */
            color: white;
            border: none;
            padding: 12px 20px;
            margin: 12px 0;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #f39c12; /* Laranja mais claro */
            transform: translateY(-2px);
        }

        button:active {
            background-color: #e67e22; /* Mantém o laranja original */
            transform: translateY(2px);
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7; /* Cinza claro para borda */
            border-radius: 8px;
            font-size: 16px;
            color: #34495e; /* Cinza escuro para texto */
            background-color: #ecf0f1; /* Fundo cinza suave */
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
            border-color: #e67e22; /* Laranja no foco */
            outline: none;
            background-color: #ffffff; /* Foco no fundo branco */
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Syndicate System</h1>
        <p>You are an Internal Advisor</p>

        <form action="{{ route('giving') }}" method="get" class="form-group">
            <button type="submit">Give Review</button>
        </form>

        <form action="{{ route('vision') }}" method="get" class="form-group">
            <button type="submit">See Project Review</button>
        </form>

    </div>
</body>
</html>
