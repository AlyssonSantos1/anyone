<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Advisors Space</title>
</head>
<body>
    <form action="{{  route('reviewssofaround')  }}" method="POST">
        @csrf
        <label for="">PersonalReviews</label>
        <input type="text" placeholder="personalreviews" name="personalreviews_user" >
        <br><br>
        <label for="">ReviewsofProject</label>
        <input type="text" placeholder="ReviewsofProject" name="reviews_project">
        <br><br><br>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>