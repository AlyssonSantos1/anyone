<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project By Executive Only</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

</head>
<body>
<form action="/executive-new" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">        
    @csrf
    <label for="projectname_project">Project Name</label>
    <input type="text" placeholder="Enter the project name" name="projectname_project" required>
    <br>
    <label for="teammanager_team">Name of the Manager</label>
    <select name="teammanager_team" required>
        <option value="">Select Manager</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="numberofmembers_project">Number of Members in Project</label>
    <input type="number" placeholder="Number of members" name="numberofmembers_project" required>
    <br>
    <label for="goals_project">Project Goals</label>
    <input type="text" placeholder="Project Goals" name="goals_project" required>
    <br>
    <label for="description_project">Project Description</label>
    <input type="text" placeholder="Description of the project" name="description_project" required>
    <br>
    <label for="reviews_project">Project Reviews</label>
    <input type="text" placeholder="Reviews of the project" name="reviews_project" required>
    <br>
    <label for="authorreview_project">Author of the Review</label>
    <input type="text" placeholder="Author of Review" name="authorreview_project" required>
    <br>
    <label for="members_project">Choose Associates for the Project</label>
    <select name="members[]" required multiple size="5" style="width: 100%; height: auto;">
        @foreach($associates as $associate)
            <option value="{{ $associate->id }}">{{ $associate->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="internaladvisor">Choose Internal Advisor for the Project</label>
    <select name="internaladvisor" required>
        <option value="">Select Internal Advisor</option>
        @foreach($internaladvisors as $advisor)
            <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="button" id="addAssociatesButton">Add Associates</button>
    <div id="selectedAssociates" style="margin-top: 20px;">
    </div>

    <br>
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
        body {
            background-color: #e8f5e9;
            font-family: Arial, sans-serif;
            color: #333; 
        }

        form {
            background-color: #c8e6c9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
            color: #333;
        }

        input, select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="text"], input[type="number"] {
            color: #555;
        }

        select {
            color: #555;
            background-color: #fff;
        }

        button {
            background-color: #388e3c; 
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2c6b31;
        }

        .remove_associate_btn, .remove_project_btn {
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

        .remove_associate_btn:hover, .remove_project_btn:hover {
            background-color: #c62828; 
        }
    </style>
</body>
</html>