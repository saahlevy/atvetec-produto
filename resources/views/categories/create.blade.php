<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Categoria</title>
</head>
<body>
    <h1>Crie uma nova Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">Criar Categoria</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar a lista de categorias</a>
</body>
</html>
