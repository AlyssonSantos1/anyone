<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project By Executive Only</title>
</head>
<body>
<form action="/executive-new" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">        
    @csrf
    <label for="projectname_project">Project Name</label>
    <input type="text" placeholder="Enter the project name" name="projectname_project" required>
    <br><br>
    <label for="teammanager_team">Name of the Manager</label>
    <select name="teammanager_team" required>
        <option value="">Select Manager</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
        @endforeach
    </select>
    <br><br>
    <label for="numberofmembers_project">Number of Members in Project</label>
    <input type="number" placeholder="Number of members" name="numberofmembers_project" required>
    <br><br>
    <label for="goals_project">Project Goals</label>
    <input type="text" placeholder="Project Goals" name="goals_project" required>
    <br><br>
    <label for="description_project">Project Description</label>
    <input type="text" placeholder="Description of the project" name="description_project" required>
    <br><br>
    <label for="reviews_project">Project Reviews</label>
    <input type="text" placeholder="Reviews of the project" name="reviews_project" required>
    <br><br>
    <label for="authorreview_project">Author of the Review</label>
    <input type="text" placeholder="Author of Review" name="authorreview_project" required>
    <br><br>
    <label for="members_project">Choose Associates for the Project</label>
    <select name="members[]" required multiple size="5" style="width: 100%; height: auto;">
        @foreach($associates as $associate)
            <option value="{{ $associate->id }}">{{ $associate->name }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="button" id="addAssociatesButton">Add Associates</button>

    <div id="selectedAssociates" style="margin-top: 20px;">
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

    <button type="submit">Create New Project</button>

    <style>
    label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    select[name="teammanager_team"], select[name="members[]"] {
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