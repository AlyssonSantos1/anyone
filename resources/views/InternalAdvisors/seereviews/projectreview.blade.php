<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisor.rtl.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        label {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            background-color: #f1f8ff;
            color: #34495e;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        select:focus, textarea:focus {
            border-color: #e67e22;
            outline: none;
            background-color: #ffffff;
        }

        button {
            background-color: #e67e22;
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        button:hover {
            background-color: #f39c12;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #e67e22;
            transform: translateY(2px);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .review-content {
            margin-top: 30px;
            text-align: left;
            font-size: 18px;
            color: #34495e;
            line-height: 1.6;
        }

        .alert {
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Syndicate System</h1>
        <p>You are an Internal Advisor</p>

        @if(auth()->check() && strtolower(auth()->user()->hierarchy) == 'internaladvisor')
            <form id="projectForm" class="form-group">
                <label for="project">Choose a Project to View:</label>
                <select name="project_id" id="project" onchange="fetchReview()">
                    <option value="">Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->projectname }}
                        </option>
                    @endforeach
                </select>
            </form>

            <div id="review-container">

            </div>

        @else
            <p class="alert">You need to be logged in as an Internal Advisor to view project reviews.</p>
        @endif
    </div>

    <script>
        function fetchReview() {
            const projectId = document.getElementById('project').value;

            if (projectId) {
                fetch(`/advisors/review-team?project_id=${projectId}`, {
                    method: 'GET',
                })
                .then(response => response.text()) 
                .then(data => {
                    document.getElementById('review-container').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching review:', error);
                });
            } else {
                document.getElementById('review-container').innerHTML = '';
            }
        }
    </script>
</body>
</html>
