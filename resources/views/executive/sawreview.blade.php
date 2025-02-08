<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Space</title>
</head>
<body>
    <form action="{{  route  ('', )  }}" method="POST">
        @csrf
        @method("PUT")
            
        <label for="">Name </label>
        <input type="text" placeholder="Name" name="name_user">
        <br><br>
        <label for="">Current Project Working</label>
        <input type="text" placeholder="currentproject" name="project_user">
        <br><br>
        <label for="">Current Project Working</label>
        <input type="text" placeholder="currentproject" name="project_user">
        <br><br><br>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>