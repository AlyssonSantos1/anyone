<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('done-it', ['projectId' => 3]) }}" method="POST">
    @csrf
    <div>
        <label for="review">Review:</label>
        <textarea id="review" name="review" required>Write the Review Here</textarea>
    </div>
    <button type="submit">Submit Review</button>
    </form>
</body>
</html>