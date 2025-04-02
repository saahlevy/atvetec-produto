<?php

namespace App\Http\Controllers;

use App\Models\ProductOffer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductOfferController extends Controller
{
    public function index()
    {
        $productOffers = ProductOffer::with(['product', 'seller'])->get();
        return view('product-offers.index', compact('productOffers'));
    }

    public function create()
    {
        return view('product-offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $offer = new ProductOffer();
        $offer->product_id = $request->product_id;
        $offer->price = $request->price;
        $offer->stock = $request->stock;
        $offer->seller_id = Auth::id();
        $offer->save();

        return redirect()->route('products.show', $offer->product_id);
    }

    public function show(ProductOffer $productOffer)
    {
        return view('product-offers.show', compact('productOffer'));
    }

    public function edit(ProductOffer $productOffer)
    {
        $this->authorize('update', $productOffer);
        return view('product-offers.edit', compact('productOffer'));
    }

    public function update(Request $request, ProductOffer $productOffer)
    {
        $this->authorize('update', $productOffer);

        $request->validate([
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $productOffer->update([
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.show', $productOffer->product_id);
    }

    public function destroy(ProductOffer $productOffer)
    {
        $this->authorize('delete', $productOffer);
        $productOffer->delete();

        return redirect()->route('products.index');
    }
}
