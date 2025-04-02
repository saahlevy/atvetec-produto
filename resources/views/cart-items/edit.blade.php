@extends('layouts.main')

@section('title', 'Editar Carrinho')

@section('content')
    <h1>Editar Carrinho</h1>
    <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="quantity">Quantidade:</label>
            <input type="number" name="quantity" id="quantity" value="{{ $cartItem->quantity }}" required>
        </div>
        <button type="submit">Atualizar Carrinho</button>
    </form>
@endsection
