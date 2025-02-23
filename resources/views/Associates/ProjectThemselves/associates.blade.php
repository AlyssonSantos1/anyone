<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Advisors Space</title>
</head>
<body>
    <form action="{{  route('catch-review')  }}" method="POST">
        @csrf
        <label for="">PersonalReviews</label>
        <input type="text" placeholder="personalreviews" name="personalreviews_user">
        <br><br>
        <label for="">ReviewsofTeam</label>
        <input type="text" placeholder="ReviewsofTeam" name="aaaa">
        <br><br><br>
        <button type="submit">Send</button>
    </form>
    
</body>
</html> -->

<form action="{{ route('reviewtheirteam') }}" method="POST">
    @csrf
    <label for="">Project ID</label>
    <input type="text" name="project_id" value="{{ old('project_id') }}" required>
    <br><br>

    <label for="">User ID</label>
    <input type="text" name="user_id" value="{{ old('user_id') }}" required>
    <br><br>

</form>
