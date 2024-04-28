<x-app-layout>
    <div class="bg-white">
        <div class="pt-6">
            <!-- Breadcrumb navigation -->
            <nav aria-label="Breadcrumb" class="px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb items -->
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600">Home</a></li>
                    <li><span class="text-gray-400">/</span></li>
                    <li><a href="{{ route('products') }}" class="text-gray-400 hover:text-gray-600">Products</a></li>
                    <li><span class="text-gray-400">/</span></li>
                    <li aria-current="page" class="text-gray-800 font-medium">{{ $product->name }}</li>
                </ol>
            </nav>

            <!-- Main content grid -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                <!-- Left column: Main image and gallery -->
                <div class="lg:col-span-1">
                    <!-- Main image -->
                    <div class="mb-6">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" id="mainImage" class="w-full h-auto">
                    </div>

                    <!-- Thumbnail gallery with horizontal scroll -->
                    <div class="lg:flex lg:overflow-x-auto lg:space-x-2">
                        @foreach($images as $index => $image)
                            <img src="{{ $image->path }}" alt="{{ $product->name }}" class="inline-block w-20 h-auto mx-2 cursor-pointer"
                                 onclick="changeMainImage('{{ $image->path }}')">
                        @endforeach
                    </div>
                </div>

                <!-- Right column: Product details -->
                <div class="lg:col-span-1 lg:border-l lg:border-gray-200 lg:pl-8">
                    <!-- Product name and details -->
                    <div class="mb-6">
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h1>
                        <p class="text-lg text-gray-600 mt-2">{{ $product->description }}</p>
                        <p class="text-xl text-gray-900 font-bold mt-4">${{ $product->price }}</p>
                        <!-- Button to add product to cart -->
                        <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add to Cart
                            </button>
                        </form>
                    </div>

                    <!-- Delivery options -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Delivery Options:</h2>
                        <ul class="list-disc list-inside text-gray-600">
                            <li>Delivered today (order Mon-Fri before 12:00, delivery between 5:00 PM and 10:00 PM)</li>
                            <li>Also in the evening during the week</li>
                            <li>Also delivered on Sunday (order before Sat 11:59 PM)</li>
                        </ul>
                    </div>

                    <!-- Other product details (e.g., options) -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Options:</h2>
                        <ul class="list-disc list-inside text-gray-600">
                            <li>Size:</li>
                            <li>Color:</li>
                            <!-- Add more options as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript function to change the main image on thumbnail click -->
    <script>
        function changeMainImage(imageSrc) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = imageSrc;
        }
    </script>
</x-app-layout>
