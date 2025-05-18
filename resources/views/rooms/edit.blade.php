<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-cyan-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Ruangan</h1>
                <p class="text-lg text-gray-600">Perbarui informasi ruangan {{ $room->name }}</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="p-6 sm:p-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Ruangan -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Ruangan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" required value="{{ old('name', $room->name) }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: Ruang Meeting A">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kode Ruangan -->
                        <div class="space-y-2">
                            <label for="code" class="block text-sm font-medium text-gray-700">Kode Ruangan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </div>
                                <input type="text" name="code" id="code" required value="{{ old('code', $room->code) }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: RM-A1">
                            </div>
                            @error('code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kapasitas -->
                        <div class="space-y-2">
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <input type="number" name="capacity" id="capacity" required value="{{ old('capacity', $room->capacity) }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: 10" min="1">
                            </div>
                            @error('capacity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lantai -->
                        <div class="space-y-2">
                            <label for="floor" class="block text-sm font-medium text-gray-700">Gedung</label>
                            <select name="floor" id="floor" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Gedung</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('floor', $room->floor) == $i ? 'selected' : '' }}>Gedung {{ $i }}</option>
                                @endfor
                            </select>
                            @error('floor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tipe Ruangan -->
                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Ruangan</label>
                            <select name="type" id="type" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Tipe</option>
                                <option value="meeting" {{ old('type', $room->type) == 'meeting' ? 'selected' : '' }}>Ruang Meeting</option>
                                <option value="class" {{ old('type', $room->type) == 'class' ? 'selected' : '' }}>Ruang Kelas</option>
                                <option value="laboratory" {{ old('type', $room->type) == 'laboratory' ? 'selected' : '' }}>Laboratorium</option>
                                <option value="office" {{ old('type', $room->type) == 'office' ? 'selected' : '' }}>Kantor</option>
                                <option value="auditorium" {{ old('type', $room->type) == 'auditorium' ? 'selected' : '' }}>Auditorium</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="occupied" {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>Terisi</option>
                                <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>Dalam Perawatan</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fasilitas -->
                        <div class="space-y-2">
                            <label for="facilities" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @php
                                    $facilitiesOld = old('facilities');
                                    $facilitiesValue = is_array($facilitiesOld)
                                        ? implode(', ', $facilitiesOld)
                                        : ($facilitiesOld ?? (is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities));
                                @endphp

                                <input type="text" name="facilities" id="facilities"
                                    value="{{ $facilitiesValue }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: Proyektor, AC, Whiteboard">
                            </div>
                            @error('facilities')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi (Full Width) -->
                        <div class="md:col-span-2 space-y-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan deskripsi tentang ruangan ini">{{ old('description', $room->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- QR Code Preview -->
                        <div class="md:col-span-2 flex flex-col items-center">
                            <div class="mb-2 text-sm font-medium text-gray-700">QR Code Saat Ini</div>
                            <div class="p-2 bg-white border border-gray-200 rounded">
                                {!! QrCode::size(120)->generate(route('rooms.show', $room)) !!}
                            </div>
                            <p class="mt-2 text-xs text-gray-500">QR code akan otomatis diperbarui setelah perubahan disimpan</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-2 pt-4">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('rooms.show', $room) }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Batal
                                </a>
                                <button type="submit" class="px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>