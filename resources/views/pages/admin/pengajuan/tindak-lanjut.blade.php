<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tindak Lanjut</h1>
            </div>

            <!-- Right: Actions -->
            <div class="flex justify-end space-x-2">
                <!-- Search Form -->
                <form action="{{ route('admin.tindakLanjut') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari pengajuan..." value="{{ old('search', $searchTerm) }}" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Cari</button>
                </form>
            </div>

        </div>

        @foreach($pengajuanGroup as $groupName => $pengajuans)
        <!-- Card -->
        <div class="bg-gray-100 dark:bg-gray-800 border-2 border-gray-400 dark:border-none p-4 rounded-lg mb-6">
            <div class="flex justify-between items-center mb-4 bg-gray-200 dark:bg-gray-700 p-2 rounded">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $groupName }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">Alamat: {{ $pengajuans->first()->user->alamat }}</p>
                </div>
            </div>

            <!-- List -->
            <ul>
                @foreach($pengajuans as $pengajuan)
                <li class="flex justify-between items-center border-t border-gray-300 dark:border-gray-700 py-2">
                    <div class="text-gray-800 dark:text-gray-100">{{ $pengajuan->nama_aplikasi }}</div>
                    <div class="flex items-center">

                        <!-- Menampilkan status pengajuan -->
                        <span class="font-semibold {{ $pengajuan->status == 'Disetujui' ? 'text-green-600 dark:text-green-400' : ($pengajuan->status == 'Ditolak' ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-gray-400') }}">
                            {{ $pengajuan->status }}
                        </span>

                        <a href="{{ route('admin.detail.tindakLanjut', $pengajuan->id) }}" class="ml-4 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 py-1 px-3 rounded">Detail</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $pengajuanPaginated->appends(['search' => $searchTerm])->links() }}
        </div>
    </div>
</x-app-layout>
