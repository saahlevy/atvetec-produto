<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Marketplace')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('products.index') }}">Produtos</a></li>
                <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}">Meu Painel</a></li> {{-- Alterado para o Dashboard --}}
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Sair</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a href="{{ route('register') }}">Registrar</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 Sarah Levy</p>
    </footer>
</body>
</html>
