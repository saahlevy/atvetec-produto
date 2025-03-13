<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
</head>
<body>
    <h1>Detalhes do Produto</h1>

    <p><strong>ID:</strong> {{ $product['id'] }}</p>
    <p><strong>Nome:</strong> {{ $product['name'] }}</p>
    <p><strong>Quantidade</strong> {{ $product['amount'] }}</p>

    <a href="{{ route('products.edit', $product['id']) }}">
        <button type="button">Editar Produto</button>
    </a>

    <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este Produto?')">Deletar produto</button>
    </form>

    <hr>

    <a href="{{ route('products.index') }}">Voltar a lista de produtos</a>
</body>
</html>

