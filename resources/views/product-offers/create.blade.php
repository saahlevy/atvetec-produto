@extends('layouts.main')

@section('title', 'Criar Oferta')

@section('content')
    <h1>Criar Oferta para o Produto</h1>
    <form action="{{ route('products.offers.store', $product->id) }}" method="POST">
        @csrf
        <div>
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" required>
        </div>
        <button type="submit">Criar Oferta</button>
    </form>
@endsection
