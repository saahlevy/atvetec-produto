<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>
<body>
    <h1>Bem-vindo!</h1>
    <p>Escolha uma das opções abaixo</p>

    <ul>
        <li>
            <a href="{{ route('users.index') }}">Visualizar Lista de Usuários</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">Visualizar Lista de Produtos</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Visualizar Lista de Categorias</a>
        </li>
    </ul>

    <hr>
</body>
</html>
