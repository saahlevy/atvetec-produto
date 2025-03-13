<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
</head>
<body>
    <h1>Editar Categoria</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category['name']) }}" required>
        <br><br>

        <button type="submit">Atualizar Categoria</button>
    </form>

    <hr>

    <a href="{{ route('categories.show', $category['id']) }}">Voltar para os detalhes da categoria</a>

    <a href="{{ route('categories.index') }}">Voltar para a lista de categorias</a>
</body>
</html>
