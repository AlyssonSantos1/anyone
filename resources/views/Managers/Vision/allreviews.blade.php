<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('manager-all') }}" method="get">
    <div>
        <h3>Personal Reviews:</h3>
        <p>{{ $personalReviews ? $personalReviews : 'No personal reviews' }}</p>
    </div>

    <div>
        <h3>Team Reviews:</h3>
        @if(isset($teamReviews) && count($teamReviews) > 0)
            @foreach($teamReviews as $teamReview)
                <p>{{ $teamReview['name'] }}: {{ $teamReview['reviews'] }}</p>
            @endforeach
        @else
            <p>No team reviews</p>
        @endif
    </div>

    <div>
        <h3>Project Reviews:</h3>
        @foreach($reviews as $projectReview)
            <p>{{ $projectReview['name'] }}: {{ $projectReview['reviews'] }}</p>
        @endforeach
    </div>

</form>

</body>
</html>