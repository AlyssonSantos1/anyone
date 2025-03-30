<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
</head>
<body>
    <h1>You are a Manager </h1>
   

    <form action="{{ route('temporarytrade') }}" method="get">
        <button type="submit">Swap User to Internal Advisor</button>
    </form>

    <form action="{{ route('manager-all')}}" method="get">
    <button type="submit">See All reviews</button>
    </form>

    
</body>
</html>