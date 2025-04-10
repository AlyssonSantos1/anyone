<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Squad</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

    <style>
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
            color: #333;
        }

        #squadForm {
            background-color: #ffffff; 
            padding: 30px;
            border-radius: 12px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

        input, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px; 
            border: 1px solid #ccc; 
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
            font-size: 16px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4caf50; 
            background-color: #ffffff;
        }

        button {
            background-color: #28a745; 
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px; 
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        li {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        .remove_associate_btn, .remove_project_btn {
            background-color: #d32f2f; 
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

        select {
            appearance: auto; 
            background-color: #f9f9f9;
            color: #333;
        }
    </style>
</head>
<body>

    <form action="/group" method="POST" id="squadForm">
        @csrf
        <h2>Create New Squad</h2>

        <label for="teammanager_team">Name of the Manager</label>
        <select name="teammanager_team" required>
            <option value="">Select Manager</option>
            @foreach($managers as $manager)
                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
            @endforeach
        </select>

        <label for="reviewsofsquad_team">Reviews of Squad</label>
        <input type="text" placeholder="Reviews of the Squad" name="reviewsofsquad_team" required>

        <label for="members_team">Choose Associates for the Squad</label>
        <select id="members_select" name="members[]" size="5" required>
            @foreach($associates as $associate)
                <option value="{{ $associate->id }}">{{ $associate->name }}</option>
            @endforeach
        </select>
        <button type="button" id="confirm_associate_btn" onclick="addAssociate()">Confirm Associate</button>
        <ul id="selected_associates_list"></ul>

        <label for="projects_team">Choose Projects for the Squad</label>
        <select id="projects_select" name="projectnames[]" size="5" required>
            @foreach($projectnames as $projectname)
                <option value="{{ $projectname }}">{{ $projectname }}</option>
            @endforeach
        </select>
        <button type="button" id="confirm_project_btn" onclick="addProject()">Confirm Project</button>
        <ul id="selected_projects_list"></ul>

        <button type="submit">Confirm Selection</button>
    </form>

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
