<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('users.update', $user['id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user['name']) }}" required>
        <br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user['email']) }}" required>
        <br><br>

        <button type="submit">Atualizar Usuário</button>
    </form>

    <hr>

    <a href="{{ route('users.show', $user['id']) }}">Voltar para os detalhes do usuário</a>

    <a href="{{ route('users.index') }}">Voltar para a lista de usuários</a>
</body>
</html>
