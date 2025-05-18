<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar - Modern Glass Morphism Effect -->
        <x-sidebar />


        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Mobile Header -->
            <header class="md:hidden bg-white/90 backdrop-blur-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center space-x-2">
                        <button @click="open = !open" class="text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
                    </div>
                    <div class="relative">
                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-medium">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="absolute -bottom-0.5 -right-0.5 bg-white rounded-full p-0.5">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 border border-white"></div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 bg-gradient-to-br from-gray-50 to-gray-100">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                    <!-- Total Rooms Card -->
                    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden hover:shadow-sm transition-all">
                        <div class="p-5">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Rooms</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $total }}</p>
                                    <p class="text-xs text-gray-400 mt-2">Updated: {{ now()->format('d M Y H:i') }}</p>
                                </div>
                                <div class="p-3 rounded-xl bg-blue-50 text-blue-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-500 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Available Rooms Card -->
                    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden hover:shadow-sm transition-all">
                        <div class="p-5">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Available Rooms</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $available }}</p>
                                    <p class="text-xs text-gray-400 mt-2">{{ $total > 0 ? round(($available / $total) * 100, 2) . '% availability' : '0% availability' }}</p>                                </div>
                                <div class="p-3 rounded-xl bg-green-50 text-green-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-green-500 rounded-full" style="width: {{ $total > 0 ? round(($available / $total) * 100, 2) . '% availability' : '0% availability' }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Occupied Rooms Card -->
                    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden hover:shadow-sm transition-all">
                        <div class="p-5">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Occupied Rooms</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $occupied }}</p>
                                    <p class="text-xs text-gray-400 mt-2">{{ $total > 0 ? round(($occupied / $total) * 100, 2) . '% occupancy' : '0% occupancy' }}</p>
                                </div>
                                <div class="p-3 rounded-xl bg-red-50 text-red-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-red-500 rounded-full" style="width: {{ $total > 0 ? round(($occupied / $total) * 100, 2) . '% occupancy' : '0% occupancy' }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <!-- Filter Tabs -->
                    <div class="flex rounded-lg bg-gray-100 p-1">
                        <a href="{{ route('rooms.index') }}" class="px-3 py-1.5 text-sm font-medium rounded-md transition-all {{ request()->is('rooms') && !request()->has('status') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600 hover:text-gray-800' }}">
                            All Rooms
                        </a>
                        <a href="{{ route('rooms.index', ['status' => 'available']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md transition-all {{ request()->input('status') == 'available' ? 'bg-white shadow-sm text-green-600' : 'text-gray-600 hover:text-gray-800' }}">
                            Available
                        </a>
                        <a href="{{ route('rooms.index', ['status' => 'occupied']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md transition-all {{ request()->input('status') == 'occupied' ? 'bg-white shadow-sm text-red-600' : 'text-gray-600 hover:text-gray-800' }}">
                            Occupied
                        </a>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <button class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Room
                        </a>
                    </div>
                </div>

                <!-- Rooms Table -->
                <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden">
                    @if(isset($rooms) && $rooms->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Room Details
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Floor
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Capacity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($rooms as $room)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-semibold text-gray-900">{{ $room->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $room->code }} • {{ $room->type }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2.5 py-1 inline-flex text-xs leading-4 font-semibold rounded-full 
                                                {{ $room->status == 'available' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $room->status == 'occupied' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $room->status == 'maintenance' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                {{ $room->status == 'available' ? 'Available' : '' }}
                                                {{ $room->status == 'occupied' ? 'Occupied' : '' }}
                                                {{ $room->status == 'maintenance' ? 'Maintenance' : '' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Floor {{ $room->floor }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $room->capacity }} <span class="text-gray-400">people</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('rooms.show', $room) }}" class="text-blue-500 hover:text-blue-700 p-1 rounded-md hover:bg-blue-50 transition-colors">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('rooms.edit', $room) }}" class="text-indigo-500 hover:text-indigo-700 p-1 rounded-md hover:bg-indigo-50 transition-colors">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 p-1 rounded-md hover:bg-red-50 transition-colors" onclick="return confirm('Are you sure you want to delete this room?')">
                                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $rooms->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="mt-2 text-lg font-semibold text-gray-900">No rooms found</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new room</p>
                            <div class="mt-6">
                                <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Room
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>