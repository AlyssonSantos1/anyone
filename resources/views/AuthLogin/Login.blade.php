<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    @if($errors->any)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    @session('message')
    <div style="
        padding: 15px; 
        margin: 10px 0; 
        border: 1px solid #f5c2c7; 
        border-radius: 5px; 
        background-color: #f8d7da; 
        color: #842029;
        font-family: Arial, sans-serif;
        display: flex;
        align-items: center;
    ">
        <strong>{{ $value }}</strong>
    </div>

    @endsession

    <form action="{{ route('sucess') }}" method="POST">
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