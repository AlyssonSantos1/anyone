<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Area</title>
</head>
<body>
    <form action="{{  route ('Deleted')   }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for=""> Delete Review Yourself</label>
        @if(auth()->check())
        <input type="text" placeholder="Yourself Reviews" name="personalreviews_user" value="{{ old('personalreviews_user', auth()->user()->personalreviews) }}">
        @else
        <p>Você precisa estar autenticado para excluir sua review.</p>
        @endif
        <br><br><br>


        <button type="submit">Delete</button>
    </form>
    

</body>
</html>