<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('gave-review') }}" method="POST">
    @csrf
    <input type="text" placeholder="projectreviews" name="projectreviews_project" required>  
    <button type="submit">Send Review</button>
</form>

</body>
</html>