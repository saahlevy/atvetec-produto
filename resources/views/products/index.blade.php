@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <h1>Lista de Produtos</h1>

    @if ($products->isEmpty())
        <p>Nenhum produto disponível no momento.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }} - {{ $product->category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
