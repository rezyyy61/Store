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
                                            <div
                                                class="flex-shrink-0 h-16 w-16 overflow-hidden rounded-md border border-gray-200">
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
                                                    ${{ $item['product']['price'] }}
                                                </p>
                                                @if ($item['quantity'] > 0)
                                                    <livewire:cart-list-component :item="$item" :key="$key" />
                                                @endif
                                                <div class="flex items-center mb-4">
                                                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500"
                                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         fill="currentColor" viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        4.95</p>
                                                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        out of</p>
                                                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        5</p>
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
                            <p class="text-gray-600">Total Items: <span id="total-items">{{ $totalSelected}}</span>
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
