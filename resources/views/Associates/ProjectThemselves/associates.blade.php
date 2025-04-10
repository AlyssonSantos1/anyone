<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Reviews</title>
    <link rel="stylesheet" href="{{ asset('css/morph.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; 
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding-top: 40px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            text-align: left;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #8e44ad; 
        }

        h4 {
            font-size: 20px;
            color: #f39c12;
            margin-top: 20px;
        }

        p {
            font-size: 16px;
            color: #34495e; 
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .project {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #ecf0f1;
            border-left: 5px solid #8e44ad;
            border-radius: 8px;
        }

        .project p {
            margin: 8px 0;
        }

        .no-reviews {
            color: #e74c3c; 
        }

        .no-reviews-member {
            font-style: italic;
            color: #bdc3c7; 
        }

        .alert {
            background-color: #f39c12; 
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            color: #fff;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <div class="container">
        @if(auth()->check()) 
            @if(isset($reviews) && !empty($reviews))
                @foreach($reviews as $review)
                    <div class="project">
                        <h3>{{ $review['project']->projectname }}</h3>
                        <p><strong>Project Goals:</strong> {{ $review['project']->goals }}</p>
                        <p><strong>Description:</strong> {{ $review['project']->description }}</p>

                        @if($review['projectReviews'])
                            <h4>Project Review:</h4>
                            <p>{{ $review['projectReviews'] }}</p>
                        @else
                            <p class="no-reviews">No review available for this project.</p>
                        @endif

                        @if(count($review['membersReviews']) > 0)
                            <h4>Member Reviews:</h4>
                            @foreach($review['membersReviews'] as $memberReview)
                                <p>{{ $memberReview ?? 'No review available.' }}</p>
                            @endforeach
                        @else
                            <p class="no-reviews-member">No member reviews available.</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="alert">You are not associated with any projects or there are no reviews available.</p>
            @endif
        @else
            <p class="alert">You need to be logged in to view reviews.</p>
        @endif
    </div>
</body>
</html>
