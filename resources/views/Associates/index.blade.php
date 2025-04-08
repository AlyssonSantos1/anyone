<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Syndicate System</title>
    

    <style>
        /* Usando fonte moderna e limpa */
        body {
            font-family: 'Arial', sans-serif; /* Fonte mais simples e legíveis */
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Fundo branco suave */
            color: #333333; /* Cor de texto escuro para boa legibilidade */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #2c3e50; /* Cor escura para o título, mais suave e legível */
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555555; /* Cor do texto para parágrafos, mais suave */
            margin: 10px 0;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #3498db; /* Azul claro para botões */
            color: white;
            border: none;
            padding: 12px 24px;
            margin: 10px 0;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #2980b9; /* Azul mais escuro no hover */
            transform: translateY(-2px);
        }

        button:active {
            background-color: #3498db; /* Cor de azul novamente no clique */
            transform: translateY(2px);
        }

        .alert {
            background-color: #eaf2f8; /* Fundo azul muito claro */
            color: #2980b9; /* Azul mais forte para o texto */
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            font-size: 16px;
            border: 1px solid #2980b9;
        }

    </style>
</head>
<body>

    <h1>Welcome to the Syndicate System</h1>
    <p>Associate Area</p>    
   

    <form action="{{ route('complete') }}" method="get">
        <button type="submit">Click to See Reviews</button>
    </form>

    <form action="{{ route('tradetoadv') }}" method="get">
        <button type="submit">Swap User to Internal Advisor</button>
    </form>

</body>
</html>
