<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System </title>
    <link rel="stylesheet" href="{{ asset('css/internaladvisor.rtl.css') }}">

</head>
<body>
<h1>Welcome to the Syndicate System </h1>
    <p>You are an internal Advisor </p>

    <form action="{{ route('giving') }}" method="get">
        <button type="submit">Give Review</button>
    </form>

    <form action="{{ route('vision') }}" method="get">
    <button type="submit">See Project Review</button>
    </form>

    
</body>
</html>