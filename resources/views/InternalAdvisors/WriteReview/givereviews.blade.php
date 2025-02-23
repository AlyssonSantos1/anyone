<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="/advisors/gave" method="POST">
    @csrf
    <input type="text" placeholder="Write your review" name="reviews_project" required>  
    <button type="submit">Send</button> -->
    <form action="/advisors" method="POST">
    @csrf
    <input type="hidden" name="project_id" value="{{ $project->id }}">
    <br><br>
    <div>
        <label for="projectname">Project Name:</label>
        <input type="text" name="projectname" value="{{ $project->projectname }}" disabled>
    </div>
    <br><br>
    <div>
        <label for="numberofmembers">Number of Members:</label>
        <input type="text" name="numberofmembers" value="{{ $project->numberofmembers }}" disabled>
    </div>
    <br><br>
    <!-- Outros campos obrigatórios podem ser exibidos aqui, mas como são apenas de leitura, pode deixá-los desabilitados -->
    <div>
        <label for="reviews_project">Write your Review:</label>
        <textarea name="reviews_project" id="reviews_project" rows="4" placeholder="Enter your review" required></textarea>
    </div>

    <button type="submit">Submit Review</button>
</form>

</form>

</body>
</html>