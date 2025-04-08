<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project By Executive Only</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

    <style>
        body {
            background-color: #f1f8e9; /* Cor de fundo suave para todo o corpo */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fonte elegante e moderna */
            color: #333;
        }

        /* Formulário centralizado com bordas arredondadas e fundo suave */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 70%;
            margin: auto;
            max-width: 900px;
        }

        /* Título do formulário com bordas arredondadas */
        h2 {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            color: #388e3c; /* Cor de destaque verde */
            background-color: #c8e6c9;
            padding: 10px;
            border-radius: 10px; /* Borda arredondada */
            margin-bottom: 25px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #388e3c; /* Cor verde clara */
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px; /* Borda arredondada */
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f1f8e9;
        }

        input[type="text"], input[type="number"] {
            color: #555;
        }

        select {
            color: #555;
            background-color: #fff;
        }

        button {
            background-color: #388e3c; /* Verde com um tom mais forte */
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px; /* Borda arredondada */
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2c6b31; /* Cor mais escura ao passar o mouse */
        }

        .associate-item {
            padding: 8px;
            margin: 5px;
            background-color: #c8e6c9;
            border-radius: 6px;
            font-size: 16px;
            color: #388e3c;
        }

        /* Botão de remoção de associados */
        .remove_associate_btn {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 4px 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
            border-radius: 4px;
            margin-left: 10px;
        }

        .remove_associate_btn:hover {
            background-color: #c62828;
        }

        /* Estilo do botão Add Associates */
        #addAssociatesButton {
            background-color: #4caf50;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 12px;
            font-weight: bold;
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        #addAssociatesButton:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>

    <!-- Formulário de Criação de Novo Projeto -->
    <form action="/executive-new" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
        @csrf
        
        <!-- Título destacado -->
        <h2>Create New Project</h2>

        <!-- Campo de Nome do Projeto -->
        <label for="projectname_project">Project Name</label>
        <input type="text" placeholder="Enter the project name" name="projectname_project" required>

        <!-- Campo de Nome do Gerente -->
        <label for="teammanager_team">Name of the Manager</label>
        <select name="teammanager_team" required>
            <option value="">Select Manager</option>
            @foreach($managers as $manager)
                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
            @endforeach
        </select>

        <!-- Número de Membros -->
        <label for="numberofmembers_project">Number of Members in Project</label>
        <input type="number" placeholder="Number of members" name="numberofmembers_project" required>

        <!-- Metas do Projeto -->
        <label for="goals_project">Project Goals</label>
        <input type="text" placeholder="Project Goals" name="goals_project" required>

        <!-- Descrição do Projeto -->
        <label for="description_project">Project Description</label>
        <input type="text" placeholder="Description of the project" name="description_project" required>

        <!-- Avaliações do Projeto -->
        <label for="reviews_project">Project Reviews</label>
        <input type="text" placeholder="Reviews of the project" name="reviews_project" required>

        <!-- Autor da Avaliação -->
        <label for="authorreview_project">Author of the Review</label>
        <input type="text" placeholder="Author of Review" name="authorreview_project" required>

        <!-- Escolher Associados -->
        <label for="members_project">Choose Associates for the Project</label>
        <select name="members[]" required multiple size="5" style="width: 100%; height: auto;">
            @foreach($associates as $associate)
                <option value="{{ $associate->id }}">{{ $associate->name }}</option>
            @endforeach
        </select>

        <!-- Escolher Conselheiro Interno -->
        <label for="internaladvisor">Choose Internal Advisor for the Project</label>
        <select name="internaladvisor" required>
            <option value="">Select Internal Advisor</option>
            @foreach($internaladvisors as $advisor)
                <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
            @endforeach
        </select>

        <!-- Botão para Adicionar Associados -->
        <button type="button" id="addAssociatesButton">Add Associates</button>
        <div id="selectedAssociates" style="margin-top: 20px;"></div>

        <!-- Botão para Submeter o Formulário -->
        <button type="submit">Create New Project</button>
    </form>

    <!-- Script para adicionar associados -->
    <script>
        document.getElementById('addAssociatesButton').addEventListener('click', function() {
            let selectedAssociates = document.querySelector('select[name="members[]"]').selectedOptions;
            let selectedList = document.getElementById('selectedAssociates');
            let addedAssociates = [];

            for (let i = 0; i < selectedAssociates.length; i++) {
                let associateName = selectedAssociates[i].text;
                let associateId = selectedAssociates[i].value;

                if (![...selectedList.children].some(div => div.textContent.includes(associateName))) {
                    let associateDiv = document.createElement('div');
                    associateDiv.textContent = associateName;
                    associateDiv.classList.add('associate-item');
                    associateDiv.setAttribute('data-id', associateId);

                    selectedList.appendChild(associateDiv);
                    selectedAssociates[i].disabled = true;

                    addedAssociates.push(associateName);
                }
            }

            if (addedAssociates.length > 0) {
                alert('Associates added to the project');
            } else {
                alert('Please select at least one associate');
            }
        });
    </script>

</body>
</html>
