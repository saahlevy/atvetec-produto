<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <!--Checando se há alguma mensagem a ser entregue pelo sistema e colore de acordo-->
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @elseif(session('warning'))
        <p style="color: red; font-weight: bold;">{{ session('warning') }}</p>
    @endif

    <ul>
        @foreach ($products as $product)
            <li>
                <strong>ID</strong> {{ $product['id'] }} | 
                <strong>Nome</strong> {{ $product['name'] }} | 
                <a href="{{ route('products.show', $product['id']) }}">Ver Produto</a>
            </li>
        @endforeach
    </ul>

    <form action="{{ route('products.create') }}" method="GET">
        <button type="submit">Criar Novo Produto</button>
    </form>


    <hr>

    <p>Para visualizar um usuário, clique no link "Ver Produto" ou vá até a URL <strong>/products/{id}</strong> (por exemplo, <strong>/products/1</strong>).</p>

    <hr>

    <a href="{{ route('home') }}">Voltar a página inicial</a>
</body>
</html>
