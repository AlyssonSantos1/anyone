<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{  route('wrote')  }}" method="POST">
        @csrf
        <label for="">ReviewsofProject</label>
        <input type="text" placeholder="ReviewsofProject" name="projectreviews_project" required>
        <br><br><br>
        
        
    </form>
</body>
</html>