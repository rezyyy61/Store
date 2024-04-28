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
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function cart()
    {
        $cartItems = session()->get('cart', []);
        $totalPrice = 0; // Initialize total price variable

        foreach ($cartItems as $item) {
            if (isset($item['product'])) {
                // Calculate the total price by multiplying product price with quantity
                $totalPrice += $item['product']->price ;
            }
        }

        return view('products.cart', compact('cartItems', 'totalPrice'));
    }


    public function updateCartItem(Request $request, $productId)
    {

        $cart = session()->get('cart', []);

        if (array_key_exists($productId, $cart) && $cart[$productId]['quantity'] > 0) {
            $cart[$productId]['quantity']++; // Increment quantity
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

}
