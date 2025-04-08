<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
    <link rel="stylesheet" href="{{ asset('css/spacelab.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f5f9; /* Cinza muito claro */
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
            text-align: left;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50; /* Cor escura para o título */
        }

        p {
            font-size: 16px;
            color: #34495e; /* Cinza escuro */
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-size: 16px;
            color: #34495e;
            display: block;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            background-color: #ecf0f1;
            color: #34495e;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #f39c12; /* Amarelo para foco */
            outline: none;
            background-color: #ffffff; /* Fundo branco no foco */
        }

        button {
            background-color: #3498db; /* Azul claro */
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
            background-color: #2980b9; /* Azul mais escuro no hover */
            transform: translateY(-2px);
        }

        button:active {
            background-color: #3498db; /* Azul claro no clique */
            transform: translateY(2px);
        }

        .alert {
            background-color: #e74c3c; /* Vermelho suave */
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        @if($projects->isEmpty())
            <p class="alert">You are not associated with any projects.</p>
        @else
            <h1>Select a Project to Take Temporary Internal Advisor Position</h1>
            <form action="{{ route('swap-positions') }}" method="POST">
                @csrf
                @method('PUT')

                <label for="project">Choose a project:</label>
                <select name="project_id" id="project">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->projectname }}</option>
                    @endforeach
                </select>

                <button type="submit">Proceed with Trade</button>
            </form>
        @endif
    </div>

</body>
</html>
