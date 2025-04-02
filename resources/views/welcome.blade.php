@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Bem-vindo ao Marketplace</h1>
        <p>Aqui você pode encontrar diversos produtos vendidos por diferentes vendedores.</p>
        
        <a href="{{ route('products.index') }}">Ver Produtos</a>
    </div>
@endsection

