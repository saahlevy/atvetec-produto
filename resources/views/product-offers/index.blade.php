@extends('layouts.main')

@section('content')
    <h1>Lista de Ofertas de Produtos</h1>

    @auth
        @if(auth()->user()->role === 'seller')
            <a href="{{ route('product-offers.create') }}">Criar Nova Oferta</a>
        @endif
    @endauth

    @if ($productOffers->isEmpty())
        <p>Nenhuma oferta disponível.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productOffers as $offer)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->product->name }}</td>
                        <td>R$ {{ number_format($offer->price, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('product-offers.show', $offer) }}">Ver</a>

                            @auth
                                @if(auth()->user()->role === 'seller')
                                    <a href="{{ route('product-offers.edit', $offer) }}">Editar</a>
                                    <form action="{{ route('product-offers.destroy', $offer) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Excluir</button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
