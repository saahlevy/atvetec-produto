<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    // Lista os itens do carrinho do usuário autenticado
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->with('productOffer.product')->get();
        return view('cart-items.index', compact('cartItems'));
    }

    // Exibe o formulário para adicionar um item ao carrinho
    public function create()
    {
        return view('cart-items.create');
    }

    // Adiciona um item ao carrinho
    public function store(Request $request)
    {
        $request->validate([
            'product_offer_id' => 'required|exists:product_offers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Certifica-se de que o usuário só pode adicionar ao próprio carrinho
        $cartItem = CartItem::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_offer_id' => $request->product_offer_id,
            ],
            [
                'quantity' => $request->quantity,
            ]
        );

        return redirect()->route('cart-items.index');
    }

    // Exibe um item específico do carrinho
    public function show(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);
        return view('cart-items.show', compact('cartItem'));
    }

    // Exibe o formulário de edição para alterar a quantidade de um item no carrinho
    public function edit(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);
        return view('cart-items.edit', compact('cartItem'));
    }

    // Atualiza a quantidade de um item no carrinho
    public function update(Request $request, CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart-items.index');
    }

    // Remove um item do carrinho
    public function destroy(CartItem $cartItem)
    {
        $this->authorizeCartItem($cartItem);
        $cartItem->delete();

        return redirect()->route('cart-items.index');
    }

    // Método privado para verificar se o usuário tem permissão para acessar o item do carrinho
    private function authorizeCartItem(CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id()) {
            abort(403, 'Acesso negado.');
        }
    }
}
