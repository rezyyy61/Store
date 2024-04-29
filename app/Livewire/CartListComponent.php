<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class CartListComponent extends Component
{
    public $cartItems = [];
    public $item;
    public $selected = 1;

    public function mount()
    {
        // Retrieve cart items from session
        $this->cartItems = session()->get('cart', []);
        // Initialize the 'selected' property for each cart item
        foreach ($this->cartItems as $productId => $cartItem) {
            if (!isset($cartItem['selected'])) {
                $this->cartItems[$productId]['selected'] = 1;
            }
        }
    }

    public function incrementToCart(Product $product)
    {
        $productId = $product->id;
        $cartItem = $this->cartItems[$productId] ?? null;

        if ($cartItem) {
            $cartItem['selected'] += 1;
            // Update the cart item in the cartItems array
            $this->cartItems[$productId] = $cartItem;
            session()->put('cart', $this->cartItems);
            $this->selected = $cartItem['selected'];
            dd($cartItem);
        }
    }

    public function decrementToCart(Product $product)
    {
        $productId = $product->id;
        $cartItem = $this->cartItems[$productId] ?? null;

        if ($cartItem ) {
            if ($cartItem['selected'] > 1) {
                $cartItem['selected'] -= 1;
                // Update the cart item in the cartItems array
                $this->cartItems[$productId] = $cartItem;
                session()->put('cart', $this->cartItems);
                $this->selected = $cartItem['selected'];
                dd($cartItem);
            }
        }
    }

    public function render()
    {
        return view('livewire.cart-list-component', [
            'cartItems' => $this->cartItems,
        ]);
    }
}
