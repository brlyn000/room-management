<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-cyan-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Ruangan Baru</h1>
                <p class="text-lg text-gray-600">Isi formulir berikut untuk menambahkan ruangan baru ke sistem</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <form action="{{ route('rooms.store') }}" method="POST" class="p-6 sm:p-8">
                    @csrf
                    
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
                                <input type="text" name="name" id="name" required
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: Ruang Meeting A">
                            </div>
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
                                <input type="number" name="capacity" id="capacity" required
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: 10">
                            </div>
                        </div>

                        <!-- Lantai -->
                        <div class="space-y-2">
                            <label for="floor" class="block text-sm font-medium text-gray-700">Gedung</label>
                            <select name="floor" id="floor" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Gedung</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">Gedung {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Tipe Ruangan -->
                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Ruangan</label>
                            <select name="type" id="type" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Tipe</option>
                                <option value="meeting">Ruang Meeting</option>
                                <option value="class">Ruang Kelas</option>
                                <option value="laboratory">Laboratorium</option>
                                <option value="office">Kantor</option>
                                <option value="auditorium">Auditorium</option>
                            </select>
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
                                <input type="text" name="facilities[]" id="facilities"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: Proyektor, AC, Whiteboard">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="available">Tersedia</option>
                                <option value="occupied">Terisi</option>
                                <option value="maintenance">Dalam Perawatan</option>
                            </select>
                        </div>

                        <!-- Deskripsi (Full Width) -->
                        <div class="md:col-span-2 space-y-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan deskripsi tentang ruangan ini"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-2 pt-4">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('rooms.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Batal
                                </a>
                                <button type="submit" class="px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    Simpan Ruangan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>