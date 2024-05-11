<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                @foreach ($products as $product)
                    <div class="group relative overflow-hidden transition duration-300 ease-in-out">
                        <a href="{{ route('product.buy', $product->id) }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-56 object-cover object-center">
                        </a>
                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                            <div class="flex items-center mt-2.5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <!-- Star Rating SVGs -->
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $product->rating)
                                            <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 2.4l1.96 4.45h4.96l-3.8 3.5 1.86 4.5-4.82-2.5-4.82 2.5 1.86-4.5-3.8-3.5h4.96L10 2.4zm0 0l1.96 4.45h4.96l-3.8 3.5 1.86 4.5-4.82-2.5-4.82 2.5 1.86-4.5-3.8-3.5h4.96L10 2.4z" clip-rule="evenodd"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 2.4l1.96 4.45h4.96l-3.8 3.5 1.86 4.5-4.82-2.5-4.82 2.5 1.86-4.5-3.8-3.5h4.96L10 2.4zm0 0l1.96 4.45h4.96l-3.8 3.5 1.86 4.5-4.82-2.5-4.82 2.5 1.86-4.5-3.8-3.5h4.96L10 2.4z" clip-rule="evenodd"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-3">
                                    5.0
                                </span>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-lg font-semibold text-gray-900">${{ $product->price }}</p>
                                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
