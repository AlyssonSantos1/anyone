<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Squad </title>
</head>
<body>
<form action="/group" method="POST" id="squadForm">
    @csrf

    <label for="teammanager_team">Name of the Manager</label>
    <select name="teammanager_team" required>
        <option value="">Select Manager</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label for="reviewsofsquad_team">Reviews of Squad</label>
    <input type="text" placeholder="Reviews of the Squad" name="reviewsofsquad_team" required>
    <br><br>

    <label for="members_team">Choose Associates for the Squad</label>
    <select id="members_select" name="members[]" size="5" style="width: 100%; height: auto;" required>
        @foreach($associates as $associate)
            <option value="{{ $associate->id }}">{{ $associate->name }}</option>
        @endforeach
    </select>
    <button type="button" id="confirm_associate_btn" onclick="addAssociate()">Confirm Associate</button>
    <ul id="selected_associates_list"></ul>
    <br><br>

    <label for="projects_team">Choose Projects for the Squad</label>
    <select id="projects_select" name="projectnames[]" size="5" style="width: 100%; height: auto;" required>
        @foreach($projectnames as $projectname)
            <option value="{{ $projectname }}">{{ $projectname }}</option>
        @endforeach
    </select>
    <button type="button" id="confirm_project_btn" onclick="addProject()">Confirm Project</button>
    <ul id="selected_projects_list"></ul>
    <br><br>

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


    </form>

    <style>
    
        body {
            background-color: #f4e1a1; 
            font-family: Arial, sans-serif;
            color: #333; 
        }

        #squadForm {
            background-color: #fff8e1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #f9a825; 
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f57f17;
        }

        ul {
            padding-left: 20px;
        }

        li {
            font-size: 16px;
            margin-bottom: 5px;
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
    </style>
</body>
</html>