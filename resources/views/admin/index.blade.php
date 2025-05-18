<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-gray-200">
                <!-- User Profile -->
                <div class="flex items-center justify-center h-16 px-4 bg-blue-600">
                    <span class="text-white font-semibold text-lg">Room Management</span>
                </div>
                <div class="flex flex-col items-center p-4 border-b border-gray-200">
                    <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl mb-2">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <h3 class="font-medium text-gray-900">{{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-500">Edit Profile</a>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-2 py-4 space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-100 rounded-md group">
                        <svg class="mr-3 h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('rooms.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-md group">
                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Daftar Ruangan
                    </a>
                    <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-md group">
                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Manajemen User
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Mobile header -->
            <header class="md:hidden bg-white shadow">
                <div class="flex items-center justify-between px-4 py-3">
                    <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                    <button @click="open = !open" class="text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 bg-gray-50">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Rooms -->
                    <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-cyan-100 text-cyan-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Ruangan</p>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $total }}</p>
                                    <p class="text-xs text-gray-400 mt-1">Terakhir diperbarui: {{ now()->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Available Rooms -->
                    <div class="bg-white overflow-hidden shadow rounded-lg border border-green-100 hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Ruangan Kosong</p>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $available }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ round(($available/$total)*100, 2) }}% dari total</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Occupied Rooms -->
                    <div class="bg-white overflow-hidden shadow rounded-lg border border-red-100 hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Ruangan Terisi</p>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $occupied }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ round(($occupied/$total)*100, 2) }}% dari total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter and Action Buttons -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <div class="flex space-x-2">
                        <a href="{{ route('rooms.index') }}" class="px-3 py-1 rounded-md text-sm font-medium {{ request()->is('rooms') && !request()->has('status') ? 'bg-blue-100 text-blue-700' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                            Semua
                        </a>
                        <a href="{{ route('rooms.index', ['status' => 'available']) }}" class="px-3 py-1 rounded-md text-sm font-medium {{ request()->input('status') == 'available' ? 'bg-green-100 text-green-700' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                            Kosong
                        </a>
                        <a href="{{ route('rooms.index', ['status' => 'occupied']) }}" class="px-3 py-1 rounded-md text-sm font-medium {{ request()->input('status') == 'occupied' ? 'bg-red-100 text-red-700' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                            Terisi
                        </a>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Ruangan
                        </a>
                    </div>
                </div>

                <!-- Rooms List -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    @if(isset($rooms) && $rooms->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Ruangan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kode
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Lantai
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kapasitas
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($rooms as $room)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $room->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $room->type }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 font-mono">{{ $room->code }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $room->status == 'available' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $room->status == 'occupied' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $room->status == 'maintenance' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                {{ $room->status == 'available' ? 'Tersedia' : '' }}
                                                {{ $room->status == 'occupied' ? 'Terisi' : '' }}
                                                {{ $room->status == 'maintenance' ? 'Perawatan' : '' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Lantai {{ $room->floor }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $room->capacity }} orang
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('rooms.show', $room) }}" class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                                            <a href="{{ route('rooms.edit', $room) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">Hapus</button>
                                            </form>
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
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak ada ruangan</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan ruangan baru</p>
                            <div class="mt-6">
                                <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah Ruangan
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>