<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Riwayat</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Add any buttons or actions here -->
            </div>

        </div>

        <!-- Detail Content -->
        <div class="bg-gray-200 dark:bg-gray-800 shadow-md rounded px-6 pt-6 pb-1 mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Informasi Pengguna</h2>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Pengguna:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">{{ $pengajuan->user->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        OPD:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">{{ $pengajuan->user->name_opd }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        No Telepon:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">{{ $pengajuan->user->no_telepon }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Alamat Email:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">{{ $pengajuan->user->email }}</p>
                </div>
            </div>

            <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Detail Permintaan</h2>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Aplikasi:
                    </label>
                    <p class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">{{ $pengajuan->nama_aplikasi }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Gambaran Umum Aplikasi:
                    </label>
                    <p class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">{{ $pengajuan->gambaran_umum }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Jenis Pengguna Aplikasi:
                    </label>
                    <p class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">{{ $pengajuan->jenis_pengguna }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Fitur-fitur Aplikasi:
                    </label>
                    <p class="w-full px-3 py-5 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">{{ $pengajuan->fitur }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Detail Konsep Aplikasi:
                    </label>
                    <input type="file" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">
                </div>
            </div>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Catatan Verifikator</h2>
                <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <p name="catatan_verifikator" class="w-full px-3 py-14 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">{{ $pengajuan->catatan_verifikator }}</p>
                    </div>


                    <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Progres Aplikasi</h2>
                    <p name="progress" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">{{ $pengajuan->progress }}</p>
                    <br>
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="setuju" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-gray-300">Centang bila aplikasi sudah selesai</span>
                        </label>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
