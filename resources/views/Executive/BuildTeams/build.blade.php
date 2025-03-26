<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Squad </title>
</head>
<body>
    <form action="/built" method="POST">               
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
    <select name="members[]" required multiple size="5" style="width: 100%; height: auto;">
        @foreach($associates as $associate)
            <option value="{{ $associate->id }}">{{ $associate->name }}</option>
        @endforeach
    </select>
    <button type="button" id="addAssociatesButton">Confirm Associates</button> 
    <div id="selectedAssociates" style="margin-top: 20px;"></div>
    <br><br>
    <label for="projects_team">Escolha os Projetos para o Squad</label>
    <select name="projectnames[]" required multiple size="5" style="width: 100%; height: auto;">
        @foreach($projectnames as $projectname)
            <option value="{{ $projectname }}">{{ $projectname }}</option>
        @endforeach
    </select>
    <button type="button" id="addProjectsButton">Confirm Project</button>
    <br><br>
    <div id="selectedProjects" style="margin-top: 20px;"></div>
    </div>

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
            }
        }

        if (addedAssociates.length > 0) {
            alert('Associates added to the squad');
        } else {
            alert('Please select at least one associate');
        }
    });

    document.getElementById('addProjectsButton').addEventListener('click', function() {
        let selectedProjects = document.querySelector('select[name="projectnames[]"]').selectedOptions;
        let selectedList = document.getElementById('selectedProjects');
        let addedProjects = [];

        for (let i = 0; i < selectedProjects.length; i++) {
            let projectName = selectedProjects[i].text;
            let projectId = selectedProjects[i].value;

            if (![...selectedList.children].some(div => div.textContent.includes(projectName))) {
                let projectDiv = document.createElement('div');
                projectDiv.textContent = projectName;
                projectDiv.classList.add('project-item');
                projectDiv.setAttribute('data-id', projectId);

                selectedList.appendChild(projectDiv);
                selectedProjects[i].disabled = true;  
            }
        }

        if (addedProjects.length > 0) {
            alert('Projects added to the squad');
        } else {
            alert('Please select at least one project');
        }
    });
</script>


    <button type="submit">Create New Squad</button>

    <style>
      
        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        select[name="teammanager_team"], select[name="members[]"], select[name="projectnames[]"] {
            font-size: 14px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            height: auto;
            background-color: #f9f9f9;  
            margin-bottom: 10px;
        }

        select[name="members[]"] {
            height: 150px; 
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #selectedAssociates div {
            background-color: #f2f2f2;
            padding: 8px;
            margin-bottom: 5px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            margin-right: 5px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #d3d3d3;  
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .form-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
    </style>
    
</body>
</html>