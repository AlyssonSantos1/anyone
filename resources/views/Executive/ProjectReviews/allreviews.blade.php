<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Space of Vision</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.executive.css') }}">

    <style>
        body {
            background-color: #f4f1e1; 
            font-family: 'Roboto', sans-serif; 
            color: #3e3b3a; 
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 50px auto;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #d4af37;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            color: #3e2723; 
            display: block;
            margin-bottom: 8px;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #b58e81; 
            border-radius: 10px; 
            box-sizing: border-box;
            font-size: 16px;
        }


        select {
            color: #3e3b3a;
            background-color: #fafafa;
        }

        button {
            background-color: #d4af37; 
            color: white;
            border: none;
            font-size: 18px;
            font-weight: 600;
            padding: 14px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        button:hover {
            background-color: #b38b27; 
        }

        .remove_associate_btn, .remove_project_btn {
            background-color: #d32f2f; 
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            border-radius: 6px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .remove_associate_btn:hover, .remove_project_btn:hover {
            background-color: #c62828;
        }
    </style>

</head>
<body>
    <form action="{{ route('executive.review-authors') }}" method="get">
        <h2>Executive Space of Vision</h2>
        
        <label for="project_id">Select a Project</label>
        <select name="project_id" id="project_select" required>
            <option value="">Select a Project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->projectname }}</option>
            @endforeach
        </select>

        <button type="submit">See Authors</button>
    </form>
</body>
</html>
