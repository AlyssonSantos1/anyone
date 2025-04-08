<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Project Review</title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisors.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6f2ff; /* Azul claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50; /* Cor escura para o título */
        }

        label {
            font-size: 16px;
            color: #34495e; /* Cor escura para o texto do label */
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            background-color: #f1f8ff; /* Azul claro para o fundo */
            color: #34495e;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        select:focus, textarea:focus {
            border-color: #2980b9; /* Azul mais forte no foco */
            outline: none;
            background-color: #ffffff; /* Fundo branco no foco */
        }

        button {
            background-color: #2980b9; /* Azul forte */
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        button:hover {
            background-color: #3498db; /* Azul mais claro no hover */
            transform: translateY(-2px);
        }

        button:active {
            background-color: #2980b9; /* Azul mais forte no clique */
            transform: translateY(2px);
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit Project Review</h1>
        <form action="{{ route('gived') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="projectreviews">Choose a Project to Review:</label>
                <select name="project_id" id="project">
                    @foreach($projects as $project)
                    <option value="{{ $project['id'] }}">{{ $project['projectname'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="projectreviews">Your Review:</label>
                <textarea id="projectreviews" name="projectreviews" required placeholder="Write the Review Here"></textarea>
            </div>

            <button type="submit">Submit Project Review</button>
        </form>
    </div>
</body>
</html>
