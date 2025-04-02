@extends('layouts.main')

@section('title', 'Editar Oferta')

@section('content')
    <h1>Editar Oferta para o Produto</h1>
    <form action="{{ route('products.offers.update', $offer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" value="{{ $offer->price }}" required>
        </div>
        <button type="submit">Atualizar Oferta</button>
    </form>
@endsection
