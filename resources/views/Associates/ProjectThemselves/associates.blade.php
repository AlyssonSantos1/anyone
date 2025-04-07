<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/morph.css') }}">

</head>
<body>
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
                        <p>No review available for this project.</p>
                    @endif

                    @if(count($review['membersReviews']) > 0)
                        <h4>Member Reviews:</h4>
                        @foreach($review['membersReviews'] as $memberReview)
                            <p>{{ $memberReview ?? 'No review available.' }}</p>
                        @endforeach
                    @else
                        <p>No member reviews available.</p>
                    @endif
                </div>
            @endforeach
        @else
            <p>You are not associated with any projects or there are no reviews available.</p>
        @endif
    @else
        <p>You need to be logged in to view reviews.</p>
    @endif

</body>
</html>