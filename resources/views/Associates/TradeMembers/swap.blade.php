<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap for Temporary Internal Advisor</title>
</head>
<body>
        <!-- Formulário que envia os dados com o método PUT -->
        <form action="{{ route('swap-positions') }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Dropdown para selecionar o projeto -->
    <label for="project_id">Select Project:</label>
    <select name="project_id" id="project_id">
        @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->projectname }}</option>
        @endforeach
    </select>

    <!-- Botão para fazer a troca -->
    <button type="submit">Swap to Internal Advisor</button>


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2f2f2f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: linear-gradient(145deg, #b97f57, #8a5930); /* Gradiente de bronze */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3), inset 0px 0px 15px rgba(255, 215, 0, 0.5);
            width: 300px;
            color: white;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="email"], input[type="password"], button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #8a5930; /* Borda bronze */
            border-radius: 8px;
            background-color: #2f2f2f;
            color: white;
            font-size: 16px;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, button:hover {
            background-color: #3d3d3d;
            outline: none;
        }

        button {
            background: #b97f57;
            cursor: pointer;
        }

        button:hover {
            background: #8a5930;
        }

        label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

    </style>
    
    </form>
</body>
</html>