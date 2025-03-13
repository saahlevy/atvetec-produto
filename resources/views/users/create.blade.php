<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Usuário</title>
</head>
<body>
    <h1>Crie um novo usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Criar Usuário</button>
    </form>

    <a href="{{ route('users.index') }}">Voltar a lista de usuários</a>
</body>
</html>
