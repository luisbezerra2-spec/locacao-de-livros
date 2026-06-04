<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        div {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            margin-right: 10px;
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        <h1>Bem Vindo a Biblioteca</h1>
    </div>
    <div>
        <h1>LIVRO</h1>
        <a href="{{ route('cadastrarLivro') }}">Cadastrar Livro</a>
        <a href="{{ route('listarLivro') }}">Listar Livro</a>
    </div>
    <div>
        <h1>LEITOR</h1>
        <a href="{{ route('cadastrarLeitor') }}">Cadastrar Leitor</a>
        <a href="{{ route('listarLeitor') }}">Listar Leitor</a>
    </div>
    <div>
        <h1>RELATORIO</h1>
        <a href="{{ route('verRelatorio') }}">Ver Relatorio</a>
    </div>
</body>
</html>
