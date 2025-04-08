<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade to Internal Advisor temporary</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.manager.css') }}">

    <style>
        /* Estilos gerais para o layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container do formulário */
        .form-container {
            background: linear-gradient(145deg, #b97f57, #8a5930);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), inset 0 0 15px rgba(255, 215, 0, 0.5);
            width: 100%;
            max-width: 400px;
            margin: 80px auto;
            color: white;
        }

        h2 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #8a5930;
            border-radius: 8px;
            background-color: #2f2f2f;
            color: white;
            font-size: 16px;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        select:focus, button:hover {
            background-color: #3d3d3d;
            outline: none;
        }

        button {
            background: #b97f57;
            cursor: pointer;
            border: none;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #8a5930;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #333;
        }

        .alert {
            text-align: center;
            padding: 15px;
            background-color: #e74c3c;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Estilos de responsividade */
        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>

    @if($projects->isEmpty())
        <div class="alert">You are not a manager with any projects.</div>
    @else
        <p>Select a Project to take Temporary Internal Advisor</p>

        <div class="form-container">
            <form action="{{ route('traded') }}" method="POST">
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
        </div>
    @endif

</body>
</html>
