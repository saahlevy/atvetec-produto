<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }}</title>
</head>
<body>
<ul>
    @foreach ($products as $product)
        <li>
            <strong>Nome:</strong> {{ $product['name'] }} |
            <strong>Quantidade:</strong> {{ $product['amount'] }} |
            <a href="{{ route('products.show', $product['id']) }}">Ver Detalhes</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('categories.index') }}">Voltar para a lista de categorias</a>

    <a href="{{ route('categories.index') }}">Voltar para a lista de categorias</a>

</body>
</html>

