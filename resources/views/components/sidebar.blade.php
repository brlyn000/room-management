<div 
    x-data="{ active: '{{ request()->route()->getName() }}' }"
    class="hidden md:flex md:w-72 flex-col border-r border-gray-200 bg-white/80 backdrop-blur-lg"
>
    <!-- Brand -->
    <div class="flex items-center justify-center h-20 px-6 bg-gradient-to-r from-blue-500 to-cyan-400">
        <div class="flex items-center space-x-2">
            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span class="text-xl font-bold text-white">OpenLia</span>
        </div>
    </div>

    <!-- User Info -->
    <div class="p-6 flex flex-col items-center border-b border-gray-100">
        <div class="relative">
            <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl mb-3 shadow-inner">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="absolute -bottom-1 -right-1 bg-white rounded-full p-1 shadow">
                <div class="h-5 w-5 rounded-full bg-green-400 border-2 border-white"></div>
            </div>
        </div>
        <h3 class="font-semibold text-gray-800">{{ Auth::user()->name }}</h3>
        <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>
        <a href="{{ route('profile.edit') }}" class="mt-3 text-sm font-medium text-blue-500 hover:text-blue-600 transition-colors">
            Edit Profile
        </a>
    </div>

    <!-- Menu Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-1">
        @php
            $links = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
                ['route' => 'rooms.index', 'label' => 'Room Management', 'icon' => 'office-building'],
                ['route' => 'users.index', 'label' => 'User Management', 'icon' => 'user-group'],
                ['route' => 'room-requests.index', 'label' => 'Request List', 'icon' => 'inbox']
            ];
        @endphp

        @foreach ($links as $link)
            <a 
                href="{{ route($link['route']) }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300
                    {{ request()->routeIs(str_replace('.', '*', $link['route'])) ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-500' }}"
            >
                <svg class="mr-3 h-5 w-5 {{ request()->routeIs(str_replace('.', '*', $link['route'])) ? 'text-blue-500' : 'text-gray-400' }}" 
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @switch($link['icon'])
                        @case('home')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            @break
                        @case('office-building')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M9 3h6a2 2 0 012 2v16H7V5a2 2 0 012-2z" />
                            @break
                        @case('user-group')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-1a4 4 0 00-5-3.9M9 20H4v-1a4 4 0 015-3.9m4-1.6a4 4 0 110-8 4 4 0 010 8z" />
                            @break
                        @case('inbox')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m0 0l3 3m0 0h10m-10 0l3-3" />
                            @break
                    @endswitch
                </svg>
                {{ $link['label'] }}
                @if ($link['route'] === 'room-requests.index' && $pendingRequestCount > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                        {{ $pendingRequestCount }}
                    </span>
                @endif
            </a>
        @endforeach
    </nav>

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-100">
        <div class="text-xs text-gray-500">v2.4.1 • Last updated 2h ago</div>
    </div>
</div>
