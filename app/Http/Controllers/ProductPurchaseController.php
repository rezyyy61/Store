<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('products.purchase', compact('product'));
    }
}
