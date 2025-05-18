<x-app-layout>
    <!-- 3D Animated Background with Particles -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 via-cyan-50/80 to-indigo-50/80"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')] opacity-20"></div>
        
        <!-- Floating 3D Shapes -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-200 rounded-full filter blur-[100px] opacity-10 animate-3d-float"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-cyan-300 rounded-full filter blur-[120px] opacity-10 animate-3d-float animation-delay-2000"></div>
        <div class="absolute top-1/3 right-1/3 w-96 h-96 bg-indigo-200 rounded-full filter blur-[150px] opacity-10 animate-3d-float animation-delay-4000"></div>
        
        <!-- Particle Effects -->
        <div class="absolute inset-0 opacity-5 particle-container"></div>
    </div>

    <div class="relative py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button with Holographic Effect -->
            <div class="mb-8">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white/95 backdrop-blur-md rounded-full shadow-lg hover:shadow-xl text-blue-600 hover:text-blue-800 transition-all duration-500 transform hover:-translate-x-1 border border-white/30 hover:border-blue-200/50 group">
                    <svg class="w-5 h-5 mr-2 transition-transform duration-500 group-hover:rotate-[-20deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="font-medium">Kembali ke Daftar Ruangan</span>
                    <span class="ml-2 inline-flex items-center justify-center w-5 h-5 rounded-full bg-blue-100 text-blue-800 text-xs font-bold transition-all duration-500 group-hover:scale-125">
                        ←
                    </span>
                </a>
            </div>

            <!-- Main Card with Glass Morphism and 3D Effect -->
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/30 transform transition-all duration-500 hover:shadow-3xl">
                <div class="md:flex h-full">
                    <!-- QR Code Section with Floating Holographic Design -->
                    <div class="md:w-1/3 p-8 bg-gradient-to-br from-blue-100/60 to-cyan-100/60 flex flex-col items-center justify-center border-b md:border-b-0 md:border-r border-white/30 relative overflow-hidden">
                        <!-- Holographic Effect Overlay -->
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iMTAiIGhlaWdodD0iMTAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')] opacity-30"></div>
                        
                        <!-- Room Code Badge with Micro-Interaction -->
                        <div class="text-center mb-6 transform transition-all duration-500 hover:scale-105">
                            <div class="inline-flex items-center px-4 py-2 bg-white/95 backdrop-blur-sm rounded-full shadow-md border border-white/30 hover:shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5 mr-2 text-blue-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 0h-1m-5 0H6m5 0v1m6 0h-1m-5 0H6m5 0v1m6 0h-1m-5 0H6" />
                                </svg>
                                <span class="font-mono font-bold text-blue-800 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">
                                    {{ $room->code }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- QR Code with Holographic Frame -->
                        <div class="relative group perspective-1000">
                            <div class="p-5 bg-white/95 backdrop-blur-sm rounded-xl shadow-xl border-2 border-dashed border-blue-300/50 transform transition-all duration-500 group-hover:rotate-y-6 group-hover:shadow-2xl">
                                <div class="transform transition duration-500 group-hover:scale-105">
                                    {!! $qrCode !!}
                                </div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="px-4 py-1.5 bg-black/80 text-white text-xs font-bold rounded-full backdrop-blur-sm shadow-lg transform transition duration-500 group-hover:scale-110">
                                    SCAN ME
                                </div>
                            </div>
                            <!-- Holographic Reflection Effect -->
                            <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-white/30 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-500 rounded-b-xl"></div>
                        </div>
                        
                        <p class="mt-6 text-sm text-gray-600 text-center flex items-center justify-center font-medium">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Scan untuk akses detail ruangan
                        </p>

                        @auth
                        @if(auth()->user()->role === 'admin')
                        <div class="mt-8 flex space-x-4">
                            <a href="{{ $room->qr_code_url }}" download="qr-{{ $room->code }}.png" 
                               class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-105 hover:shadow-xl">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download QR
                            </a>
                            <a href="{{ route('rooms.edit', $room->id) }}" 
                               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-105 hover:shadow-lg">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                        </div>
                        @endif
                        @endauth
                    </div>

                    <!-- Room Information Section with Advanced Layout -->
                    <div class="md:w-2/3 p-8">
                        <!-- Room Header with Animated Status -->
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                                    <svg class="w-8 h-8 mr-3 text-blue-500 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">
                                        {{ $room->name }}
                                    </span>
                                </h2>
                                <div class="mt-2 flex items-center text-sm text-gray-600 font-medium">
                                    <svg class="flex-shrink-0 mr-2 h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Lantai {{ $room->floor }} • {{ ucfirst($room->type) }}
                                </div>
                            </div>

                            <div class="px-4 py-2 rounded-full text-sm font-bold shadow-lg transform transition-all duration-500 hover:scale-105
                                {{ $room->status == 'available' ? 'bg-gradient-to-r from-green-100 to-green-50 text-green-800 border border-green-300/50' : '' }}
                                {{ $room->status == 'occupied' ? 'bg-gradient-to-r from-red-100 to-red-50 text-red-800 border border-red-300/50' : '' }}
                                {{ $room->status == 'maintenance' ? 'bg-gradient-to-r from-yellow-100 to-yellow-50 text-yellow-800 border border-yellow-300/50' : '' }}">
                                <span class="drop-shadow-sm">
                                    {{ $room->status == 'available' ? '🟢 Tersedia' : '' }}
                                    {{ $room->status == 'occupied' ? '🔴 Terisi' : '' }}
                                    {{ $room->status == 'maintenance' ? '🟡 Dalam Perawatan' : '' }}
                                </span>
                            </div>
                        </div>

                        <!-- Stats Cards with 3D Hover Effect -->
                        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Capacity Card -->
                            <div class="bg-gradient-to-br from-white to-blue-50/70 p-6 rounded-2xl shadow-md border border-white/40 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1.5 hover:border-blue-300/30 perspective-1000 hover:rotate-x-2 group">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 mr-4 backdrop-blur-sm border border-blue-200/40 shadow-inner transform transition duration-500 group-hover:scale-110">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Kapasitas</h4>
                                        <p class="mt-1 text-2xl font-extrabold text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">
                                            {{ $room->capacity }} <span class="text-lg font-semibold text-gray-600">orang</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Facilities Card -->
                            <div class="bg-gradient-to-br from-white to-blue-50/70 p-6 rounded-2xl shadow-md border border-white/40 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1.5 hover:border-blue-300/30 perspective-1000 hover:rotate-x-2 group">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 mr-4 backdrop-blur-sm border border-blue-200/40 shadow-inner transform transition duration-500 group-hover:scale-110">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Fasilitas</h4>
                                        <p class="mt-1 text-lg font-semibold text-gray-700">
                                            @php
                                                $facilities = is_array($room->facilities) ? $room->facilities : explode(',', $room->facilities);
                                            @endphp

                                            @if(count($facilities) > 0)
                                                {{ implode(', ', array_map('trim', $facilities)) }}
                                            @else
                                                <span class="text-gray-400 italic">-</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description Section with Toggle Animation -->
                        <div class="mt-8">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center mb-4">
                                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">
                                    Deskripsi Ruangan
                                </span>
                            </h3>
                            <div class="p-5 bg-gradient-to-br from-white to-blue-50/60 rounded-xl shadow-inner border border-white/40 transform transition duration-500 hover:scale-[1.01]">
                                @if($room->description)
                                    <p class="text-gray-700 leading-relaxed">{{ $room->description }}</p>
                                @else
                                    <p class="text-gray-400 italic">Tidak ada deskripsi tersedia</p>
                                @endif
                            </div>
                        </div>

                        <!-- Last Updated with Micro-Interaction -->
                        <div class="mt-8 pt-5 border-t border-gray-200/40">
                            <p class="text-sm text-gray-500 flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-blue-500 transition-transform duration-500 group-hover:rotate-[360deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Terakhir diperbarui: 
                                <span class="ml-1 font-medium text-gray-600 underline decoration-blue-300 decoration-wavy decoration-1 underline-offset-4">
                                    {{ $room->updated_at->format('d M Y H:i') }}
                                </span>
                            </p>
                        </div>

                        <!-- Request Form with Floating Glass Effect -->
                        <form action="{{ route('room-requests.store') }}" method="POST" class="mt-8">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                            <div class="bg-gradient-to-br from-white to-blue-50/70 p-6 rounded-2xl shadow-lg border border-white/40 transform transition duration-500 hover:shadow-xl hover:border-blue-300/30">
                                <h3 class="text-xl font-bold text-gray-900 flex items-center mb-4">
                                    <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">
                                        Request Akses Ruangan
                                    </span>
                                </h3>
                                
                                <!-- Date Picker with Floating Label -->
                                <div class="mb-5">
                                    @php
                                        $now = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:i');
                                    @endphp

                                    <div class="relative z-0">
                                        <input type="datetime-local" name="access_date" id="access_date" required
                                            class="block w-full pt-5 pb-2 px-4 bg-white/80 backdrop-blur-sm border border-gray-300/70 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer"
                                            value="{{ $now }}"
                                            min="{{ $now }}">
                                        <label for="access_date" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-4 peer-focus:left-4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                                            Waktu Akses
                                        </label>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="w-full inline-flex justify-center py-4 px-6 border border-transparent shadow-xl text-lg font-bold rounded-xl text-white bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-500 transform hover:scale-[1.02] hover:shadow-2xl relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center">
                                        <svg class="-ml-1 mr-2 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Request Room
                                    </span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Animation Styles -->
    <style>
        @keyframes float-3d {
            0%, 100% { transform: translate3d(0, 0, 0) rotate(0deg); }
            25% { transform: translate3d(20px, -20px, 10px) rotate(2deg); }
            50% { transform: translate3d(-15px, 15px, -5px) rotate(-2deg); }
            75% { transform: translate3d(10px, -10px, 5px) rotate(1deg); }
        }
        .animate-3d-float {
            animation: float-3d 12s ease-in-out infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }
        .perspective-1000 {
            perspective: 1000px;
        }
        .rotate-y-6 {
            transform: rotateY(6deg);
        }
        .rotate-x-2 {
            transform: rotateX(2deg);
        }
        .particle-container {
            background-image: radial-gradient(circle at 20% 30%, rgba(100, 149, 237, 0.1) 0%, transparent 20%),
                             radial-gradient(circle at 80% 70%, rgba(100, 149, 237, 0.1) 0%, transparent 20%);
            background-size: 200% 200%;
            animation: particle-move 20s linear infinite;
        }
        @keyframes particle-move {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
    </style>

    <!-- Particle JS Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create particle container
            const particleContainer = document.querySelector('.particle-container');
            
            // Generate particles
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'absolute rounded-full bg-blue-300/20';
                
                // Random properties
                const size = Math.random() * 5 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const delay = Math.random() * 10;
                const duration = Math.random() * 20 + 10;
                
                // Apply styles
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.animation = `particle-float ${duration}s ease-in-out ${delay}s infinite`;
                
                particleContainer.appendChild(particle);
            }
            
            // Add stylesheet for particle animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes particle-float {
                    0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.2; }
                    25% { transform: translate(10px, -10px) scale(1.1); opacity: 0.3; }
                    50% { transform: translate(-5px, 5px) scale(0.9); opacity: 0.1; }
                    75% { transform: translate(5px, -5px) scale(1.05); opacity: 0.25; }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</x-app-layout>