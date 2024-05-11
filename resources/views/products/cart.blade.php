<!-- resources/views/cart.blade.php -->

<x-app-layout>
    <div class="bg-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold mb-6">Shopping Cart</h1>

            @if (count($cartItems) > 0)

                    <!-- Left Column (Selected Products) -->

                    <livewire:cart-list-component  />
                </div>
            @else
                <p class="text-gray-600 text-xl mt-8">Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>
