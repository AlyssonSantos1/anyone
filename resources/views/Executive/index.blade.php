<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome to the Syndicate System</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        /* Ajustando o comprimento dos botões */
        .btn-custom {
            width: 300px; /* Ajuste o valor conforme necessário para o comprimento dos botões */
        }

        /* Aumentando o espaço entre o último botão e o rodapé */
        .spacer {
            margin-bottom: 50px; /* Aumente o valor conforme necessário */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Executive Painel</h2>
        <p class="text-center mb-4">Please Select One Of Options and Click in the button</p>

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex flex-column align-items-center gap-3">
            <!-- Criar Novo Usuário -->
            <form action="{{ route('executive.create') }}" method="get">
                <button type="submit" class="btn btn-primary btn-custom">Create New User</button>
            </form>

            <!-- Editar Usuário -->
            <form action="{{ route('executive.editing') }}" method="get">
                <button type="submit" class="btn btn-secondary btn-custom">Edit User</button>
            </form>

            <!-- Criar Novo Projeto -->
            <form action="{{ route('executive-build') }}" method="get">
                <button type="submit" class="btn btn-success btn-custom">Build New Project</button>
            </form>

            <!-- Ver Autores -->
            <form action="{{ route('executive.review-authors') }}" method="get">
                <button type="submit" class="btn btn-info btn-custom">See Authors</button>
            </form>

            <!-- Criar Novo Squad -->
            <form action="{{ route('team-build') }}" method="get" class="spacer">
                <button type="submit" class="btn btn-warning btn-custom">Create New Squad</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
