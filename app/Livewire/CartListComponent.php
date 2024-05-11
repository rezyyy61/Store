<?php

namespace App\Livewire;

use Livewire\Component;

class CartListComponent extends Component
{
    public $cartItems = [];
    public $item;
    public $totalPrice;
    public $totalSelected;

    public function mount()
    {
        $this->cartItems = session()->get('cart', []) ?? [];
        $this->calculateTotals();
    }

    public function increment($productId)
    {
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['selected']++;
            $this->updateCart();
            $this->calculateTotals();
        }
    }

    public function decrement($productId)
    {
        if (isset($this->cartItems[$productId]) && $this->cartItems[$productId]['selected'] > 1) {
            $this->cartItems[$productId]['selected']--;
            $this->updateCart();
            $this->calculateTotals();
        }
    }

    private function updateCart()
    {
        // Update the cart in the session
        session()->put('cart', $this->cartItems);
    }

    public function calculateTotals()
    {
        $this->totalPrice = 0;
        $this->totalSelected = 0;

        foreach ($this->cartItems as $productId => $item) {
            // Calculate total price for each item
            $this->totalPrice += $item['product']['price'] * $item['selected'];

            // Calculate total selected items
            $this->totalSelected += $item['selected'];}
    }

    public function render()
    {
        return view('livewire.cart-list-component', [
            'cartItems' => $this->cartItems,
        ]);
    }
}
