<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    @if($error->any)
        <div>
            <ul>
                @foreach($error->all() as $error)
                <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.sent') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br><br>

        <label for="email">E-mail</label>
        <input type="text" name="email" required>

        <button type="submit">Login</button>
        
    </form>
</body>
</html>