<x-app-layout>
    <div class="flex">
        <x-sidebar/>

        <div class="flex-1 px-6 py-8">
            <div class="bg-white shadow-md rounded-xl p-8 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Pengguna</h2>

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('name', $user->name) }}">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('email', $user->email) }}">
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Peran</label>
                        <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                            <option value="mahasiswa" {{ (old('role', $user->role ?? '') === 'mahasiswa') ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="admin" {{ (old('role', $user->role ?? '') === 'admin') ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}"
                           class="text-gray-600 hover:text-gray-800 mr-4">Batal</a>
                        <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
