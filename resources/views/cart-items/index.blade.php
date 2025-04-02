@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')
    <h1>Seu Carrinho</h1>

    @if ($cartItems->isEmpty())
        <p>Seu carrinho está vazio.</p>
        <a href="{{ route('products.index') }}">Explorar Produtos</a>
    @else
        <ul>
            @foreach($cartItems as $cartItem)
                <li>
                    {{ $cartItem->offer->product->name }} - Quantidade: {{ $cartItem->quantity }}
                    <a href="{{ route('cart-items.edit', $cartItem->id) }}">Editar</a>
                    <form action="{{ route('cart-items.destroy', $cartItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
