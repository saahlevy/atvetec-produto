<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Lista todas as categorias (usuários comuns e não logados podem ver)
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Exibe uma categoria específica
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Formulário para criar uma nova categoria (apenas vendedores podem acessar)
    public function create()
    {
        if (!auth()->user()->is_seller) {
            abort(403);
        }

        return view('categories.create');
    }

    // Armazena uma nova categoria (apenas vendedores podem criar)
    public function store(Request $request)
    {
        if (!auth()->user()->is_seller) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('categories.index');
    }

    // Formulário de edição da categoria (bloqueado para vendedores)
    public function edit(Category $category)
    {
        abort(403); // Somente o admin (no futuro) poderá editar
    }

    // Atualiza a categoria (bloqueado para vendedores)
    public function update(Request $request, Category $category)
    {
        abort(403); // Somente o admin (no futuro) poderá atualizar
    }

    // Exclui uma categoria (bloqueado para vendedores)
    public function destroy(Category $category)
    {
        abort(403); // Somente o admin (no futuro) poderá excluir
    }
}

