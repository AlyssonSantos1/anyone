<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{  route('')  }}" method="POST">
        @csrf
        <label for="">TeamReviews</label>
        <input type="text" placeholder="ReviewsofTeam" name="reviewsofsquad" >
        <br><br>
        <label for="">PersonalReviews</label>
        <input type="text" placeholder="PersonalReviews" name="personalreviews">
        <br><br><br>
        <button type="submit">See</button>
    </form>
</body>
</html>