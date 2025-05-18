<nav x-data="{ open: false, dropdownOpen: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('rooms.index') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="h-16 w-16 ">
                        <span class="text-xl font-bold text-gray-800">RoomManager</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                @endauth

                    
                    <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')" class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        {{ __('Rooms') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Notification Bell -->
                <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu">
                            <span class="sr-only">Open user menu</span>
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-medium">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1) )}}
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dropdown menu -->
                    <div x-show="open" 
                         @click.away="open = false" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-3 py-2 rounded-md text-base font-medium">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')" class="block px-3 py-2 rounded-md text-base font-medium">
                {{ __('Rooms') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-medium">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1) )}}
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-3 py-2 rounded-md text-base font-medium">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>