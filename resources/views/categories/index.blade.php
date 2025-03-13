<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
</head>
<body>
    <h1>Lista de Categorias</h1>

    <!--Checando se há alguma mensagem a ser entregue pelo sistema e colore de acordo-->
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @elseif(session('warning'))
        <p style="color: red; font-weight: bold;">{{ session('warning') }}</p>
    @endif

    <ul>
        @foreach ($products as $product)
            <li>
                <strong>Nome:</strong> {{ $product['name'] }} |
                <strong>Quantidade:</strong> {{ $product['amount'] }}
            </li>
        @endforeach
    </ul>

    <form action="{{ route('categories.create') }}" method="GET">
        <button type="submit">Criar Nova Categoria</button>
    </form>


    <hr>

    <p>Para visualizar um usuário, clique no link "Ver Categoria" ou vá até a URL <strong>/categories/{id}</strong> (por exemplo, <strong>/categories/1</strong>).</p>

    <hr>

    <a href="{{ route('home') }}">Voltar a página inicial</a>
</body>
</html>
