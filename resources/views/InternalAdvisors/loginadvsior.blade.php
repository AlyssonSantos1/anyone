<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System </title>
</head>
<body>
    <h1>You are an Internal Advisor </h1>
   

    <form action="{{  route('gave-review', ['projectId' => 3]) }}" method="get">
        <button type="submit">Give Review</button>
    </form>

    <form action="{{  route('see-review', ['projectId' => 3]) }}" method="get">
    <button type="submit">See the review's of the Team</button>
    </form>
    
</body>
</html>