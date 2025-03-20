<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
    {{-- associates-dashboard.blade.php --}}
    <p>You are an Associate</p>

    @if(session('user_id'))
        <p>You are logged</p>
        <form action="{{ route('catch') }}" method="get">
            <button type="submit">Click to See Reviews</button>
        </form>
    @else
        <p>You need to be logged in to perform this action.</p>
    @endif

</body>
</html>