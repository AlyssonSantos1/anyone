<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Space of Vision</title>
</head>
<body>
    <form action="{{ route('executive.review-authors') }}" method="get">
        <label for="project_id">Select a project</label>
        <select name="project_id" id="project_select" required>
            <option value="">Select a project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->projectname }}</option>
            @endforeach
        </select>
        <button type="submit">See Authors</button>
    </form>

    <style>
    body {
        background-color: #f5f0e1; /* Cor de fundo suave marrom claro */
        font-family: Arial, sans-serif;
        color: #333; /* Cor do texto */
    }

    form {
        background-color: #d7ccc8; /* Cor de fundo do formulário marrom suave */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 50%;
        margin: auto;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
        color: #3e2723; /* Cor do texto do label em marrom escuro */
    }

    input, select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #b58e81; /* Cor marrom para borda */
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    select {
        color: #3e2723; /* Cor do texto dentro do select */
        background-color: #fff;
    }

    button {
        background-color: #6d4c41; /* Cor do botão marrom */
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        color: white;
    }

    button:hover {
        background-color: #5d4037; /* Cor do botão ao passar o mouse marrom mais escuro */
    }

    .remove_associate_btn, .remove_project_btn {
        background-color: #d32f2f; /* Cor do botão de remoção */
        color: white;
        border: none;
        padding: 4px 8px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        border-radius: 4px;
        margin-left: 10px;
    }

    .remove_associate_btn:hover, .remove_project_btn:hover {
        background-color: #c62828; /* Cor do botão de remoção ao passar o mouse */
    }
</style>


</body>
</html>