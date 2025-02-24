<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('see-review', ['projectId' => 3]) }}" method="POST">
     
        <div>
            <h3>Project Reviews: </h3>
            <p>{{ $projectReviews ? $projectReviews : 'No project reviews'}} </p>
        </div>
    </form>

</body>
</html>