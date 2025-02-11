<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{  route('reviewssofaround')  }}" method="POST">
        
        <label for="">ReviewsofProject</label>
        <input type="text" placeholder="ReviewsofProject" name="reviews_project">
        <br><br><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>