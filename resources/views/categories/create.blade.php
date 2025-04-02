@extends('layouts.main')

@section('title', 'Criar Categoria')

@section('content')
    <h1>Criar Nova Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome da Categoria:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">Criar Categoria</button>
    </form>
@endsection
