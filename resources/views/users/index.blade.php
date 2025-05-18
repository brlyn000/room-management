<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar/>

        <!-- Main Content -->
        <div class="flex-1 px-6 py-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Daftar Pengguna</h2>
                    <a href="{{ route('users.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                        + Tambah Pengguna
                    </a>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-700 text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Dibuat Pada</th>
                                <th class="px-6 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="text-blue-600 hover:underline mr-3">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pengguna ini?')" class="text-red-600 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
