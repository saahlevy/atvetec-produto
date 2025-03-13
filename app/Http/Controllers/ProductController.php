<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];

        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);

        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];

        $nextId = count($products) + 1;

        $user = [
            "id" => $nextId,
            "name" => $request->input('name'),
            "amount" => $request->input('amount')
        ];
    
        $this->products[] = $user;

        return redirect()->route('products.index')->with('success', 'Produto criado.');
    }

    public function show($id)
    {
        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];

        $product = collect($products)->firstWhere('id', $id);
    
        if (!$product) {
            abort(404);
        }
    
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];
    
        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }
    
        if ($product === null) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }
    
        return view('products.edit', compact('product'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);

        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];

        foreach ($products as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $request->name;
                $product['amount'] = $request->amount;
                break;
            }
        }

        return redirect()->route('users.index')->with('success', 'Produto atualizado.');
    }

    public function destroy($id)
    {
        $products = [
            ["id" => 1, "name" => "Café", "amount" => 10],
            ["id" => 2, "name" => "Pizza", "amount" => 3],
            ["id" => 3, "name" => "Energético", "amount" => 6]
        ];

        $products = array_filter($products, function($product) use ($id) {
            return $product['id'] != $id;
        });

        $products = array_values($products);

        return redirect()->route('products.index')->with('warning', 'Produto deletado');
    }
}
