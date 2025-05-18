<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        @auth
        @if(auth()->user()->role === 'admin')
            <x-sidebar/>
        @endif
        @endauth
        
        <div class="w-full pt-5 px-4 sm:px-6 lg:px-8">
            <!-- Animated Header Section -->
            <div class="relative overflow-hidden rounded-xl bg-gradient-to-r from-indigo-500 to-primary-600 p-6 shadow-lg mb-8">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-20 -right-20 h-48 w-48 rounded-full bg-white/5"></div>
                <div class="relative z-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-white">Room Management</h1>
                            <p class="text-indigo-100 mt-1">Browse and manage all available spaces</p>
                        </div>
                        <div class="flex gap-3">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-transparent rounded-lg text-primary-600 font-medium shadow-sm hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-600 transition-all transform hover:-translate-y-0.5">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Room
                                </a>
                            @endif
                        @endauth
                            <button onclick="openScanner()" class="inline-flex items-center px-4 py-2.5 border border-white/30 rounded-lg text-white bg-white/10 font-medium shadow-sm hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-600 transition-all transform hover:-translate-y-0.5 backdrop-blur-sm">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 0h-1m-5 0H6m5 0v1m6 0h-1m-5 0H6m5 0v1m6 0h-1m-5 0H6" />
                                </svg>
                                Scan QR
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QR Scanner Modal -->
            <div id="scannerModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-md z-50 flex items-center justify-center p-4">
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-gray-700/50">
                    <div class="flex justify-between items-center p-5 border-b border-gray-700">
                        <h3 class="text-xl font-semibold text-white">Scan QR Code</h3>
                        <button onclick="closeScanner()" class="text-gray-300 hover:text-white rounded-full p-1 hover:bg-gray-700 transition">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div id="qrScanner" class="w-full aspect-square bg-black relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="absolute border-4 border-primary-400/30 rounded-xl w-64 h-64 animate-pulse"></div>
                            <div class="absolute border-2 border-dashed border-primary-400/50 rounded-lg w-56 h-56 animate-ping"></div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-700 bg-gradient-to-r from-gray-800/50 to-gray-900/50">
                        <p class="text-sm text-gray-400 text-center">Point your camera at a room QR code</p>
                    </div>
                </div>
            </div>

            <!-- Interactive Filter Panel -->
            <div class="mb-6 bg-white rounded-xl shadow-sm p-4">
                <form action="{{ route('rooms.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search rooms..." 
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                            value="{{ request('search') }}"
                        >
                    </div>
                    <div class="flex gap-3">
                        <select name="type" class="block w-full pl-3 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-gray-700">
                            <option value="">All Types</option>
                            <option value="meeting" {{ request('type') == 'meeting' ? 'selected' : '' }}>Meeting Room</option>
                            <option value="classroom" {{ request('type') == 'classroom' ? 'selected' : '' }}>Classroom</option>
                            <option value="auditorium" {{ request('type') == 'auditorium' ? 'selected' : '' }}>Auditorium</option>
                        </select>
                        <select name="status" class="block w-full pl-3 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-gray-700">
                            <option value="">All Statuses</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="occupied" {{ request('status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                        <button type="submit" class="px-4 py-2.5 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">
                            Search
                        </button>
                        @if(request()->has('search') || request()->has('type') || request()->has('status'))
                            <a href="{{ route('rooms.index') }}" class="px-4 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Room Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($rooms as $room)
                <a href="{{ route('rooms.show', $room) }}" class="group">
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden h-full flex flex-col transform hover:-translate-y-1">
                        <!-- Room Image Header with Floating Status -->
                        <div class="relative h-40 bg-gradient-to-r from-primary-500 to-indigo-600 flex items-center justify-center overflow-hidden">
                            <!-- Decorative Elements -->
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            
                            <!-- Floating QR Code Preview (Hover Effect) -->
                            <div class="absolute opacity-0 group-hover:opacity-100 transition-opacity duration-300 inset-0 flex items-center justify-center bg-black/30">
                                <div class="bg-white p-2 rounded-lg shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                                    {!! QrCode::size(80)->generate(route('rooms.show', $room)) !!}
                                </div>
                            </div>
                            
                            <div class="relative z-10 p-4 w-full">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-semibold text-white drop-shadow-md">{{ $room->name }}</h3>
                                        <p class="text-primary-100 mt-1 drop-shadow-md">Code: {{ $room->code }}</p>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold shadow-sm
                                        {{ $room->status == 'available' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $room->status == 'occupied' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $room->status == 'maintenance' ? 'bg-amber-100 text-amber-800' : '' }}">
                                        {{ $room->status == 'available' ? 'Available' : '' }}
                                        {{ $room->status == 'occupied' ? 'Occupied' : '' }}
                                        {{ $room->status == 'maintenance' ? 'Maintenance' : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Room Details -->
                        <div class="p-5 flex-1 flex flex-col bg-gradient-to-b from-white to-gray-50">
                            <div class="space-y-3 text-gray-700">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 p-1.5 bg-primary-100 rounded-lg text-primary-600 mr-3">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <span>Floor {{ $room->floor }} • {{ ucfirst($room->type) }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 p-1.5 bg-indigo-100 rounded-lg text-indigo-600 mr-3">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                                        </svg>
                                    </div>
                                    <span>Capacity: {{ $room->capacity }} people</span>
                                </div>
                                @php
                                    $facilities = is_array($room->facilities) ? $room->facilities : explode(',', $room->facilities);
                                @endphp
                                @if(count($facilities) > 0)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 p-1.5 bg-amber-100 rounded-lg text-amber-600 mr-3 mt-0.5">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm">Facilities: {{ implode(', ', array_map('trim', $facilities)) }}</span>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Interactive QR Code Section -->
                            <div class="mt-auto pt-4">
                                <div class="relative group">
                                    <div class="flex justify-center bg-gray-50 p-3 rounded-xl border-2 border-dashed border-gray-200 group-hover:border-primary-300 transition">
                                        {!! QrCode::size(100)->generate(route('rooms.show', $room)) !!}
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/30 rounded-xl">
                                        <span class="bg-white px-3 py-1 rounded-full text-xs font-semibold text-primary-600 shadow-sm">Click to view details</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <!-- Empty State with Animation -->
                <div class="md:col-span-4 py-12 text-center bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <div class="mx-auto h-32 w-32 text-gray-200 mb-4 animate-bounce">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-medium text-gray-700">No rooms available</h3>
                    <p class="mt-2 text-gray-500">Start by creating your first room</p>
                    <div class="mt-6">
                        <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-primary-500 to-indigo-600 border border-transparent rounded-xl text-white font-medium shadow-lg hover:from-primary-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all transform hover:scale-105">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Room
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
            @if (session('success'))
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0 scale-90" 
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" 
                x-transition:leave-start="opacity-100 scale-100" 
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                x-init="setTimeout(() => open = false, 3500)"
                x-cloak
            >
                <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full text-center relative">
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-green-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2l4-4M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Berhasil!</h2>
                    <p class="text-gray-600 mb-4">{{ session('success') }}</p>
                    <button 
                        @click="open = false" 
                        class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition duration-200 ease-in-out"
                    >
                        Tutup
                    </button>
                </div>
            </div>
            @endif


            <!-- Pagination with Gradient Background -->
            @if($rooms->hasPages())
            <div class="mt-8">
                <div class="bg-gradient-to-r from-gray-50 to-white p-4 rounded-xl shadow-sm border border-gray-100">
                    {{ $rooms->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Include QR Scanner Library -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        let scanner = null;
        let videoElement = null;
        let canvasElement = null;
        let canvasContext = null;

        function openScanner() {
            document.getElementById('scannerModal').classList.  ('hidden');
            
            // Initialize scanner
            videoElement = document.createElement('video');
            canvasElement = document.createElement('canvas');
            canvasContext = canvasElement.getContext('2d');
            
            document.getElementById('qrScanner').appendChild(canvasElement);
            
            navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
                .then(function(stream) {
                    videoElement.srcObject = stream;
                    videoElement.setAttribute("playsinline", true);
                    videoElement.play();
                    requestAnimationFrame(tick);
                })
                .catch(function(err) {
                    console.error("Error accessing camera: ", err);
                    alert("Could not access camera. Please ensure you've granted camera permissions.");
                });
        }

        function closeScanner() {
            document.getElementById('scannerModal').classList.add('hidden');
            if (videoElement && videoElement.srcObject) {
                videoElement.srcObject.getTracks().forEach(track => track.stop());
            }
            if (canvasElement && canvasElement.parentNode) {
                canvasElement.parentNode.removeChild(canvasElement);
            }
        }

        function tick() {
            if (videoElement.readyState === videoElement.HAVE_ENOUGH_DATA) {
                canvasElement.height = videoElement.videoHeight;
                canvasElement.width = videoElement.videoWidth;
                canvasContext.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);
                
                const imageData = canvasContext.getImageData(0, 0, canvasElement.width, canvasElement.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "dontInvert",
                });
                
                if (code) {
                    // Found QR code
                    window.location.href = code.data;
                    closeScanner();
                }
            }
            
            requestAnimationFrame(tick);
        }

        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }
    </script>
</x-app-layout>