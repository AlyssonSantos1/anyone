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
            margin: 50px auto 20px;
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

        select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #b58e81; 
            border-radius: 10px; 
            box-sizing: border-box;
            font-size: 16px;
        }

        select {
            background-color: #fafafa;
        }

        button {
            background-color: #d4af37; 
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #b38b27; 
        }

        #author_output {
            background-color: #fffdf6;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            width: 60%;
            margin: 20px auto;
            text-align: center;
            font-size: 18px;
            display: none;
            transition: all 0.3s ease;
        }

        .loading {
            font-style: italic;
            color: #a1887f;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: #3e3b3a;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <form id="projectForm">
        <h2>Executive Space of Vision</h2>
        
        <label for="project_id">Select a Project</label>
        <select name="project_id" id="project_select" required>
            <option value="">Select a Project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->projectname }}</option>
            @endforeach
        </select>

        <button type="submit">See Author</button>
    </form>

    <div id="author_output"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#projectForm').on('submit', function(e) {
                e.preventDefault();

                const projectId = $('#project_select').val();
                const output = $('#author_output');

                if (!projectId) {
                    output
                        .removeClass('success')
                        .addClass('error')
                        .html('Please select a project.')
                        .fadeIn();
                    return;
                }

                output
                    .removeClass('error success')
                    .addClass('loading')
                    .html('Loading author...')
                    .fadeIn();

                $.ajax({
                    url: "{{ route('executive.review-authors') }}",
                    method: 'GET',
                    data: { project_id: projectId },
                    success: function(response) {
                        output
                            .removeClass('loading error')
                            .addClass('success')
                            .html(response);
                    },
                    error: function() {
                        output
                            .removeClass('loading success')
                            .addClass('error')
                            .html('An error occurred while fetching the review author.');
                    }
                });
            });
        });
    </script>

</body>
</html>
