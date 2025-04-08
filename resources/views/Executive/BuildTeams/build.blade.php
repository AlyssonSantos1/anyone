<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Squad</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

    <style>
        body {
            background-color: #f4f7fa; /* Fundo suave e claro */
            font-family: Arial, sans-serif;
            color: #333;
        }

        #squadForm {
            background-color: #ffffff; /* Fundo branco do formulário */
            padding: 30px;
            border-radius: 12px; /* Borda arredondada */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 65%;
            margin: auto;
            max-width: 800px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #3c3c3c;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        /* Estilos para os inputs e selects */
        input, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px; /* Borda arredondada */
            border: 1px solid #ccc; /* Borda suave */
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
            font-size: 16px;
        }

        /* Foco no input e select */
        input:focus, select:focus {
            outline: none;
            border-color: #4caf50; /* Cor verde ao focar */
            background-color: #ffffff;
        }

        /* Estilo para o botão de envio */
        button {
            background-color: #28a745; /* Cor verde suave */
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px; /* Borda arredondada */
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838; /* Cor mais escura ao passar o mouse */
        }

        /* Estilo para as listas de associados e projetos */
        ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        li {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        /* Estilo para os botões de remover associados e projetos */
        .remove_associate_btn, .remove_project_btn {
            background-color: #d32f2f; /* Vermelho */
            color: white;
            border: none;
            padding: 4px 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            border-radius: 4px;
            margin-left: 10px;
        }

        .remove_associate_btn:hover, .remove_project_btn:hover {
            background-color: #c62828;
        }

        /* Estilo para o select */
        select {
            appearance: auto; /* Seta padrão */
            background-color: #f9f9f9;
            color: #333;
        }
    </style>
</head>
<body>

    <!-- Form to Create New Squad -->
    <form action="/group" method="POST" id="squadForm">
        @csrf
        <h2>Create New Squad</h2>

        <!-- Select Manager -->
        <label for="teammanager_team">Name of the Manager</label>
        <select name="teammanager_team" required>
            <option value="">Select Manager</option>
            @foreach($managers as $manager)
                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
            @endforeach
        </select>

        <!-- Squad Reviews -->
        <label for="reviewsofsquad_team">Reviews of Squad</label>
        <input type="text" placeholder="Reviews of the Squad" name="reviewsofsquad_team" required>

        <!-- Choose Associates -->
        <label for="members_team">Choose Associates for the Squad</label>
        <select id="members_select" name="members[]" size="5" required>
            @foreach($associates as $associate)
                <option value="{{ $associate->id }}">{{ $associate->name }}</option>
            @endforeach
        </select>
        <button type="button" id="confirm_associate_btn" onclick="addAssociate()">Confirm Associate</button>
        <ul id="selected_associates_list"></ul>

        <!-- Choose Projects -->
        <label for="projects_team">Choose Projects for the Squad</label>
        <select id="projects_select" name="projectnames[]" size="5" required>
            @foreach($projectnames as $projectname)
                <option value="{{ $projectname }}">{{ $projectname }}</option>
            @endforeach
        </select>
        <button type="button" id="confirm_project_btn" onclick="addProject()">Confirm Project</button>
        <ul id="selected_projects_list"></ul>

        <!-- Submit Button -->
        <button type="submit">Confirm Selection</button>
    </form>

    <!-- JavaScript to handle list updates -->
    <script>
        function addAssociate() {
            var select = document.getElementById('members_select');
            var selectedAssociate = select.options[select.selectedIndex];
            var list = document.getElementById('selected_associates_list');

            if (selectedAssociate) {
                var li = document.createElement('li');
                li.textContent = selectedAssociate.text;
                list.appendChild(li);
            }
        }

        function addProject() {
            var select = document.getElementById('projects_select');
            var selectedProject = select.options[select.selectedIndex];
            var list = document.getElementById('selected_projects_list');

            if (selectedProject) {
                var li = document.createElement('li');
                li.textContent = selectedProject.text;
                list.appendChild(li);
            }
        }
    </script>

</body>
</html>
