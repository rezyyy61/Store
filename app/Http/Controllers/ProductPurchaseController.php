<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.productsBuy', compact('products'));
    }

    public function buy(Product $product)
    {
        $images = ProductImage::where('product_id', $product->id)->get();
        return view('products.purchase', compact('product', 'images'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $productId = $product->id;
        $selected = $request->input('selected', 1);

        $cart = session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['selected'] += $selected;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'selected' => $selected,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function cart()
    {
        $cartItems = session()->get('cart', []);
        $totalPrice = 0;
        $totalSelected = 0;

        foreach ($cartItems as $item) {
            if (isset($item['product'])) {
                $totalPrice += $item['product']->price * $item['selected'];
                $totalSelected += $item['selected'];
            }
        }

        return view('products.cart', compact('cartItems', 'totalPrice', 'totalSelected'));
    }
}
