<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get(); // Exibe todos os produtos
        return view('products.index', compact('products'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Exibe as categorias para o vendedor selecionar
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            // Outros campos do produto
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            // Outros campos
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::with(['category', 'productOffers.seller'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Verifica se o usuário logado é o vendedor do produto
        if ($product->user_id !== auth()->id()) {
            abort(403); // Caso contrário, aborta com erro 403 (proibido)
        }

        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Verifica se o usuário logado é o vendedor do produto
        if ($product->user_id !== auth()->id()) {
            abort(403); // Caso contrário, aborta com erro 403 (proibido)
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            // Outros campos do produto
        ]);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            // Outros campos
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Verifica se o usuário logado é o vendedor do produto
        if ($product->user_id !== auth()->id()) {
            abort(403); // Caso contrário, aborta com erro 403 (proibido)
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
