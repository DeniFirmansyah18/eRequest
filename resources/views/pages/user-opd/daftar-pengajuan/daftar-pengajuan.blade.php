<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Daftar Pengajuan</h1>
            </div>

            <!-- Right: Actions -->
            <div class="flex justify-end space-x-2">
                <!-- Search Form -->
                <form action="{{ route('user_opd.daftarPengajuan') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari pengajuan..." value="{{ old('search', $searchTerm) }}" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Cari</button>
                </form>
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-sm border border-gray-200 dark:border-gray-700">
            <table class="table-auto w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Aplikasi</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Progress</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($pengajuans as $pengajuan)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">{{ $pengajuan->nama_aplikasi }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">{{ $pengajuan->progress }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">{{ $pengajuan->status }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">
                            <div class="flex space-x-2">
                                <form action="{{ route('user_opd.destroy', $pengajuan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                                </form>
                                <a href="{{ route('user_opd.ubahPengajuan', $pengajuan->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded">Ubah</a>
                                <a href="{{ route('user_opd.detailPengajuan', $pengajuan->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $pengajuans->appends(['search' => $searchTerm])->links() }}
        </div>
    </div>
</x-app-layout>