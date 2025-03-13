<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Produto</title>
</head>
<body>
    <h1>Crie um novo Produto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>

        <label for="amount">Quantidade</label>
        <input type="amount" id="amount" name="amount" required>

        <button type="submit">Criar Produto</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar a lista de produtos</a>
</body>
</html>
