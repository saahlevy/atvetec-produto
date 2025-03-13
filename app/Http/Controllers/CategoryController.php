<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = [
            ['id' => 1, 'name' => 'Bebidas'],
            ['id' => 2, 'name' => 'Massas']
        ];

        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = [
            [1 => 'Bebidas'],
            [2 => 'Massas']
        ];

        $nextId = count($categories) + 1;

        $user = [
            "id" => $nextId,
            "name" => $request->input('name')
        ];
    
        $this->categories[] = $user;

        return redirect()->route('categories.index')->with('success', 'Categoria criada.');
    }

    public function show($id)
    {
        // Definindo categorias
        $categories = [
            ['id' => 1, 'name' => 'Bebidas'],
            ['id' => 2, 'name' => 'Massas']
        ];
    
        // Definindo produtos
        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10, 'category_id' => 1],
            ["id" => 2, "name" => "Pizza", "amount" => 3, 'category_id' => 2],
            ["id" => 3, "name" => "Energético", "amount" => 6, 'category_id' => 1]
        ];
    
        // Verifica se a categoria existe com base no ID
        $category = null;
        foreach ($categories as $cat) {
            if ($cat['id'] == $id) {
                $category = $cat;
                break;
            }
        }
    
        if (!$category) {
            abort(404, 'Categoria não encontrada');
        }
    
        // Filtra os produtos pela categoria selecionada
        $categoryProducts = array_filter($products, function ($product) use ($id) {
            return $product['category_id'] == $id;
        });
    
        // Reindexando o array de produtos para evitar índices quebrados
        $categoryProducts = array_values($categoryProducts);
    
        // Retorna a view com a categoria e seus produtos
        return view('categories.index', [
            'category' => $category,
            'products' => $categoryProducts
        ]);
    }

    public function edit($id)
    {
        $categories = [
            ['id' => 1, 'name' => 'Bebidas'],
            ['id' => 2, 'name' => 'Massas']
        ];
    
        $category = null;
        foreach ($categories as $c) {
            if ($c['id'] == $id) {
                $category = $c;
                break;
            }
        }
    
        if ($category === null) {
            return redirect()->route('categories.index')->with('error', 'Categoria não encontrada.');
        }
    
        return view('categories.edit', compact('category'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = [
            ['id' => 1, 'name' => 'Bebidas'],
            ['id' => 2, 'name' => 'Massas']
        ];

        foreach ($categories as &$category) {
            if ($category['id'] == $id) {
                $category['name'] = $request->name;
                break;
            }
        }

        return redirect()->route('users.index')->with('success', 'Categoria atualizada.');
    }

    public function destroy($id)
    {
        $categories = [
            ['id' => 1, 'name' => 'Bebidas'],
            ['id' => 2, 'name' => 'Massas']
        ];

        $categories = array_filter($categories, function($category) use ($id) {
            return $category['id'] != $id;
        });

        $categories = array_values($categories);

        return redirect()->route('categories.index')->with('warning', 'Categoria deletada');
    }
}
