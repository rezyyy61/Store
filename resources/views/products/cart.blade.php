<!-- resources/views/cart.blade.php -->

<x-app-layout>
    <div class="bg-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold mb-6">Shopping Cart</h1>

            @if (count($cartItems) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column (Selected Products) -->
                    <div class="lg:col-span-2">
                        <div class="space-y-6">
                            <ul class="divide-y divide-gray-200">
                                @foreach ($cartItems as $key => $item)
                                    @if (isset($item['product']))
                                        <li class="flex items-center py-6">
                                            <!-- Product Image -->
                                            <div class="flex-shrink-0 h-16 w-16 overflow-hidden rounded-md border border-gray-200">
                                                <img src="{{ $item['product']['image'] }}"
                                                     alt="{{ $item['product']['name'] }}"
                                                     class="h-full w-full object-cover object-center">
                                            </div>
                                            <!-- Product Details -->
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-baseline">
                                                    <h3 class="text-lg font-semibold text-gray-900">{{ $item['product']['name'] }}</h3>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-600">Price:
                                                    ${{ $item['product']['price'] }}</p>

                                                <!-- Quantity Buttons -->
                                                @if ($item['quantity'] > 1)
                                                    <div class="mt-2 flex items-center space-x-2 w-1/2 ">
                                                        <!-- Decrement Arrow -->
                                                        <button type="button" class="text-gray-600">
                                                            &#9660;
                                                        </button>

                                                        <!-- Quantity Input -->
                                                        <input type="text"
                                                               class="w-1/3 text-center border border-gray-300 rounded-md">

                                                        <!-- Increment Arrow -->
                                                        <button type="button" class="text-gray-600">
                                                            &#9650;
                                                        </button>
                                                    </div>
                                                @endif
                                                <!-- Remove Button -->
                                                <div class="flex justify-between items-baseline">
                                                    <button type="button" class="text-gray-600" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block align-middle" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 1a1 1 0 00-1 1v1H5a1 1 0 100 2h1v11a2 2 0 002 2h6a2 2 0 002-2V5h1a1 1 0 100-2h-4V2a1 1 0 00-1-1zM8 9a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm3-7a1 1 0 011 1v1H8V3a1 1 0 011-1h2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                @if ($item['quantity'] > 0)
                                                    <p class="text-green-600 font-semibold">Available</p>
                                                @else
                                                    <p class="text-red-600 font-semibold">Out of Stock</p>
                                                @endif
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column (Order Summary) -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-100 rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                            <p class="text-gray-600">Total Items: <span id="total-items">{{ count($cartItems) }}</span>
                            </p>
                            <p id="total-price" class="text-gray-600">Total Price: ${{ $totalPrice }}</p>

                            <div class="mt-8">
                                <a href="#" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Continue
                                    to Ordering</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-gray-600 text-xl mt-8">Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>
