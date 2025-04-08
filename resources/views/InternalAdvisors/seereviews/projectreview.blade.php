<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
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
            text-align: center;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50; /* Escuro para o título */
        }

        p {
            font-size: 18px;
            color: #7f8c8d; /* Cor cinza para o texto */
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #34495e; /* Cor escura para o texto do label */
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            background-color: #f1f8ff; /* Azul muito claro para o fundo */
            color: #34495e;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #2980b9; /* Azul mais forte no foco */
            outline: none;
            background-color: #ffffff; /* Fundo branco no foco */
        }

        h3 {
            font-size: 20px;
            color: #2980b9; /* Azul mais forte para o título de revisão */
            margin-top: 20px;
        }

        p.no-review {
            color: #e74c3c; /* Vermelho para avisar que não há revisão */
        }

        .alert {
            background-color: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            color: #e74c3c;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Syndicate System</h1>
        <p>You are an Internal Advisor</p>

        @if(session('user_id'))
            <form action="{{ route('vision') }}" method="get">
                <label for="projectreviews">Choose a Project to View:</label>
                <select name="project_id" id="project" onchange="this.form.submit()">
                    <option value="">Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project['id'] }}" {{ request('project_id') == $project['id'] ? 'selected' : '' }}>
                            {{ $project['projectname'] }}
                        </option>
                    @endforeach
                </select>
            </form>

            @if($selectedProject = \App\Models\Project::find(request('project_id')))
                @if($selectedProject->projectreviews)
                    <h3>Review for {{ $selectedProject->projectname }}:</h3>
                    <p>{{ $selectedProject->projectreviews }}</p>
                @else
                    <p class="no-review">No review found for this project.</p>
                @endif
            @endif
        @else
            <p class="alert">You need to be logged in to view this information.</p>
        @endif
    </div>
</body>
</html>
