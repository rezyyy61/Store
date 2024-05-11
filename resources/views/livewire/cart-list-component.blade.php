<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2">
    <div class="space-y-6">
        <ul class="divide-y divide-gray-200">
            @foreach ($cartItems as $key => $item)
                @if (isset($item['product']))
                    <li class="flex items-center py-6">
                        <!-- Product Image -->
                        <div
                            class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg">
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
                            <div class="grid grid-cols-4 gap-4 mt-4 mb-4">
                                <div>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <button
                                            wire:click="decrement('{{ $item['product']['id'] }}')"
                                            type="button"
                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        <input
                                            wire:key="{{ $item['product']['id'] }}"
                                            wire:model.live="cartItems.{{ $item['product']['id'] }}.selected"
                                            value="{{ $item['selected'] }}"
                                            type="text" min="1"
                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                                        />
                                        <button
                                            wire:click="increment('{{ $item['product']['id'] }}')"
                                            type="button"
                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
        <p class="text-gray-600">Total Items: <span id="total-items">{{ $totalSelected }}</span></p>
        <p id="total-price" class="text-gray-600">Total Price: ${{  $totalPrice }}</p>

        <div class="mt-8">
            <a href="{{ route('payment.form') }}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Continue
                to Ordering</a>
        </div>
    </div>
</div>
</div>

