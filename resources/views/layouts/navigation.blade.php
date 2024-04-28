<nav x-data="{ open: false }" class="bg-gray-100 border-b border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo and Website Name -->
                <a href="#" class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" class="block h-9 w-auto"/>
                    <span class="ml-2 text-lg font-semibold text-gray-800">Your Website Name</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- Home Link -->
                    <x-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                        {{ __('Home') }}
                    </x-nav-link>
                    <!-- Products Link -->
                    <x-nav-link href="{{ route('products') }}" :active="false" class="text-gray-700 hover:text-indigo-600">
                        {{ __('Products') }}
                    </x-nav-link>
                    <!-- About Us Link -->
                    <x-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <!-- Contact Link -->
                    <x-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right-side Section (User Name, Dropdown, and Car Store) -->
            <div class="flex items-center">
                @auth
                    <!-- User Name and Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- User Name -->
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>

                        <!-- Dropdown Menu -->
                        <div class="ml-3 relative">
                            <button @click="open = !open"
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <!-- Dropdown Indicator Arrow -->
                                <svg class="ml-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                     :class="{'rotate-180': open, 'rotate-0': !open}">
                                    <path
                                        d="M10 12a1 1 0 01-.7-.29l-4-4a1 1 0 111.41-1.42L10 9.58l3.29-3.29a1 1 0 11..."></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu Items -->
                            <div x-show="open" @click.away="open = false"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                <div class="py-1" role="none">
                                    <a href="{{ route('profile.edit') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-indigo-600" role="menuitem">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-indigo-600"
                                                role="menuitem">Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Display Login Link -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <a href="{{ route('login') }}" class="text-base font-medium text-gray-800 hover:text-indigo-600">Login</a>
                    </div>
                @endauth

                <!-- Cart Store (or Add Products) -->
                <div class="ml-4 sm:ml-6 relative">
                    <a href="{{ route('cart') }}" class="text-gray-700 hover:text-indigo-600">
                        <i class="fa-solid fa-cart-shopping"></i>
                        @if(session('cart'))
                            <span class="absolute top-0 right-0 inline-block bg-red-500 text-white rounded-full px-2 py-1 text-xs">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Home Link -->
            <x-responsive-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <!-- Products Link -->
            <x-responsive-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                {{ __('Products') }}
            </x-responsive-nav-link>
            <!-- About Us Link -->
            <x-responsive-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <!-- Contact Link -->
            <x-responsive-nav-link href="#" :active="false" class="text-gray-700 hover:text-indigo-600">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-indigo-600">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link href="#"
                                               onclick="event.preventDefault(); this.closest('form').submit();"
                                               class="text-gray-700 hover:text-indigo-600">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
