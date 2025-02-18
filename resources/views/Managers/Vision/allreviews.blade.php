<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{  route('/manager/seeallreviews')  }}" method="POST">
        
        <label for="">TeamReviews</label>
        <input type="text" placeholder="ReviewsofTeam" name="reviewsofsquad" >
        <br><br>
        <label for="">PersonalReviews</label>
        <input type="text" placeholder="PersonalReviews" name="personalreviews">
        <br><br>
        <label for="">ReviewsofProject</label>
        <input type="text" placeholder="ReviewsofProject" name="reviews_project">
        <br><br><br>
        <button type="submit">See</button>
    </form>
</body>
</html>