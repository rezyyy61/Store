<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <strong>Name:</strong>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Description:</strong>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Price:</strong>
                        <p>{{ $product->price }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Image:</strong>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-64 w-auto">
                    </div>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
