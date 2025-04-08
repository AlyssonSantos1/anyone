<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.manager.css') }}">

    <style>
        /* Estilos gerais para o layout */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* Cor de fundo branco gelo */
            color: #333; /* Texto em cinza escuro */
            line-height: 1.6;
        }

        h1, h3, h4 {
            color: #2c3e50; /* Cor escura para os títulos */
            margin-bottom: 15px;
            text-align: left; /* Alinhamento à esquerda */
            font-weight: 600;
        }

        p {
            font-size: 16px;
            color: #555555; /* Texto em cinza claro */
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Container principal para o conteúdo */
        .content-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px; /* Adiciona padding para os lados */
        }

        /* Caixas para cada tipo de revisão */
        .project {
            background-color: #ffffff; /* Fundo branco para cada bloco de projeto */
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Sombra suave para dar profundidade */
            transition: box-shadow 0.3s ease-in-out;
        }

        .project:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2); /* Aumenta a sombra ao passar o mouse */
        }

        /* Estilo para as caixas de revisões */
        .review-box {
            background-color: #f9f9f9; /* Fundo claro para separar as seções */
            border: 1px solid #ddd; /* Borda suave para as caixas */
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .review-box h4 {
            background-color: #3498db; /* Azul para destacar os títulos */
            color: white;
            padding: 10px;
            border-radius: 6px;
            margin: 0 -15px 15px -15px; /* Margem negativa para alinhar o título com as bordas */
        }

        .review-box p {
            font-size: 14px;
            color: #555555;
        }

        /* Estilos para botões de interação */
        button {
            background-color: #3498db; /* Azul claro */
            color: white;
            border: none;
            padding: 12px 30px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #2980b9; /* Azul mais escuro no hover */
            transform: translateY(-2px);
        }

        button:active {
            background-color: #3498db; /* Azul claro novamente no clique */
            transform: translateY(2px);
        }

        /* Melhorando a rolagem */
        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        .content-wrapper {
            max-height: calc(100vh - 120px); /* Limita a altura para permitir rolagem */
            overflow-y: auto; /* Permite rolagem vertical */
            padding-right: 20px; /* Adiciona um espaço para a barra de rolagem */
        }

    </style>
</head>
<body>

<div class="content-wrapper">
    @if(auth()->check()) 
        @if(isset($reviews) && !empty($reviews))
            @foreach($reviews as $review)
                <div class="project">
                    <h3>{{ $review['project']->projectname }}</h3>
                    <p><strong>Project Goals:</strong> {{ $review['project']->goals }}</p>
                    <p><strong>Description:</strong> {{ $review['project']->description }}</p>

                    <!-- Caixa para a revisão do projeto -->
                    <div class="review-box">
                        <h4>Project Review:</h4>
                        @if(!empty($review['projectReviews']))
                            <p>{{ $review['projectReviews'] }}</p>
                        @else
                            <p>No review available for this project.</p>
                        @endif
                    </div>

                    <!-- Caixa para as revisões dos membros -->
                    <div class="review-box">
                        <h4>Member Reviews:</h4>
                        @if(count($review['membersReviews']) > 0)
                            @foreach($review['membersReviews'] as $memberReview)
                                <p>{{ $memberReview ? $memberReview : 'No review available.' }}</p>
                            @endforeach
                        @else
                            <p>No member reviews available.</p>
                        @endif
                    </div>

                    <!-- Caixa para as revisões pessoais -->
                    <div class="review-box">
                        <h4>Your Personal Reviews:</h4>
                        @if(count($review['personalReviews']) > 0)
                            @foreach($review['personalReviews'] as $personalReview)
                                <p>{{ $personalReview ? $personalReview : 'No personal review available.' }}</p>
                            @endforeach
                        @else
                            <p>No personal reviews available.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>You are not associated with any projects or there are no reviews available.</p>
        @endif
    @else
        <p>You need to be logged in to view reviews.</p>
    @endif
</div>

</body>
</html>
