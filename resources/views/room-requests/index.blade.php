<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar/>

        <!-- Main Content -->
        <div class="flex-1 px-6 py-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Permintaan Ruangan</h2>

                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-700 text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Tanggal Akses</th>
                                <th class="px-6 py-3 text-left">Ruangan</th>
                                <th class="px-6 py-3 text-left">Dibuat</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($roomRequests as $request)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $request->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $request->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $request->access_date }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $request->room->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $request->created_at->format('d M Y H:i') }}</td>
                                    
                                    <!-- Status Column -->
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if($request->room->status == 'occupied')
                                            <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-xs">Occupied</span>
                                        @else
                                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">Available</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 text-sm">
                                        <form method="POST" action="{{ route('room-requests.destroy', $request) }}" onsubmit="return confirm('Yakin ingin menghapus request ini?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-3 rounded-md font-bold hover:underline">Hapus</button>
                                        </form>

                                        <!-- Accept Button -->
                                        <td class="px-6 py-4 text-sm">
                                        <form method="POST" action="{{ route('room-requests.accept', $request->id) }}">
                                            @csrf
                                            <button type="submit" class="text-white py-2 px-3 rounded-md font-bold bg-green-500 hover:underline">Terima</button>
                                        </form>
                                        </td>

                                        <!-- Edit Status Button -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada permintaan ruangan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $roomRequests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
