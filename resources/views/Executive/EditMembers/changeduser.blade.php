<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Team Members</title>
</head>
<body>

    <form action="{{ route('executive.editing') }}" method="get" id="memberForm">
        @csrf
        <label for="member">Select Member to Edit:</label>
        <select name="id" id="member" required onchange="this.form.submit()">
            <option value="">Select a member</option>
            @foreach ($members as $memberOption)
                <option value="{{ $memberOption->id }}" 
                    {{ old('id', request()->id) == $memberOption->id ? 'selected' : '' }}>
                    {{ $memberOption->name }}
                </option>
            @endforeach
        </select>
    </form>
    @if(isset($member))
    <form action="{{ route('Done-Deal') }}" method="POST" id="editMemberForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $member->id }}">
        <label for="">Name</label>
        <input type="text" placeholder="Enter your name" name="name_user" value="{{ old('name_user', $member->name) }}" required>
        <br>
        <label for="">E-mail</label>
        <input type="email" placeholder="Enter your email" name="email_user" value="{{ old('email_user', $member->email) }}" required>
        <br>
        <label for="">Hierarchy</label>
        <input type="text" placeholder="Hierarchy" name="hierarchy_user" value="{{ old('hierarchy_user', $member->hierarchy) }}" required>
        <br>
        <label for="">Role</label>
        <input type="text" placeholder="Role" name="role_user" value="{{ old('role_user', $member->role) }}" required>
        <br>
        <label for="">Inserted Project User</label>
        <input type="text" placeholder="Inserted Project" name="insertedproject_user" value="{{ old('insertedproject_user', $member->insertedproject) }}" required>
        <br>
        <label for="">Personal Reviews</label>
        <input type="text" placeholder="Personal Reviews" name="personalreviews_user" value="{{ old('personalreviews_user', $member->personalreviews) }}" required>
        <br>
        <label for="">Owner of Review</label>
        <input type="text" placeholder="Owner of Review" name="ownerofreview_user" value="{{ old('ownerofreview_user', $member->ownerofreview) }}" required>
        <br>
        <button type="submit" id="submitBtn">Update Member</button>
    </form>
@endif

<style>
    body {
        background-color: #a1a7b3; /* Cinza metálico claro com brilho prateado */
        font-family: Arial, sans-serif;
        color: #333; 
    }

    form {
        background-color: #c2c7d0; /* Cinza prateado mais suave */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 50%; /* Ajuste da largura do formulário */
        margin: auto;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px; /* Reduzi ainda mais a margem */
        display: block;
        color: #555; /* Cinza escuro para o texto */
    }

    input, select, button {
        width: 100%;
        max-width: 350px; /* Limita a largura para algo mais controlado */
        padding: 8px; /* Diminuí o padding para reduzir a altura */
        margin-bottom: 8px; /* Diminuí a margem entre os campos */
        border: 1px solid #999; /* Borda prateada */
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #e3e6eb; /* Cinza claro com brilho prateado */
        color: #333;
        height: 35px; /* Diminuí a altura das caixas de texto */
    }

    button {
        background-color: #b0bec5; /* Cinza prateado para o botão */
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        color: #fff;
        height: 40px; /* Ajuste de altura do botão */
    }

    button:hover {
        background-color: #90a4ae; /* Cinza mais escuro para o hover */
    }

    ul {
        padding-left: 20px;
        margin-top: 10px; /* Ajuste da margem para um espaçamento adequado */
    }

    li {
        font-size: 16px;
        margin-bottom: 5px;
        color: #555; /* Texto em cinza escuro */
    }

    .remove_associate_btn, .remove_project_btn {
        background-color: #757575; /* Botões com fundo cinza escuro */
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
        background-color: #616161; /* Escurece no hover */
    }
</style>

</body>
</html>