@extends('layouts.main')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Categoria:</strong> {{ $product->category->name }}</p>
    <ul>
        @foreach($product->productOffers as $offer)
            <li>
                <strong>Preço:</strong> {{ $offer->price }} 
                <strong>Vendedor:</strong> {{ $offer->seller->name }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('products.offers.create', $product->id) }}">Adicionar Oferta</a>
@endsection
