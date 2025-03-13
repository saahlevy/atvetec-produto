<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
</head>
<body>
    <h1>Detalhes do Usuário</h1>

    <p><strong>ID:</strong> {{ $user['id'] }}</p>
    <p><strong>Nome:</strong> {{ $user['name'] }}</p>
    <p><strong>E-mail:</strong> {{ $user['email'] }}</p>

    <a href="{{ route('users.edit', $user['id']) }}">
        <button type="button">Editar Usuário</button>
    </a>

    <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar Usuário</button>
    </form>

    <hr>

    <a href="{{ route('users.index') }}">Voltar a lista de usuários</a>
</body>
</html>

