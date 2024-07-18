<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Ubah Pengajuan</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Add any buttons or actions here -->
            </div>

        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Detail Content -->
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Detail Permintaan</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="nama_aplikasi">
                        Nama Aplikasi:
                    </label>
                    <input class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" type="text" name="nama_aplikasi" value="{{ $pengajuan->nama_aplikasi }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="gambaran_umum">
                        Gambaran Umum Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" name="gambaran_umum" required>{{ $pengajuan->gambaran_umum }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="jenis_pengguna">
                        Jenis Pengguna Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" name="jenis_pengguna" required>{{ $pengajuan->jenis_pengguna }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="fitur_fitur">
                        Fitur-fitur Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" name="fitur_fitur" required>{{ $pengajuan->fitur_fitur }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="konsep_file">
                        Detail Konsep Aplikasi:
                    </label>
                    <div class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">
                        @if ($pengajuan->konsep_file)
                            <p>Nama File: {{ basename($pengajuan->konsep_file) }}</p>
                            <a href="{{ Storage::url($pengajuan->konsep_file) }}" class="text-blue-500 flex items-center mt-4" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-12 h-12 mr-2 mb-6">
                                    <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                </svg>
                                Unduh File Konsep Yang Lama
                            </a>
                        @else
                            <p class="text-red-500">File konsep tidak tersedia</p>
                        @endif
                        <input class="mt-2" type="file" name="konsep_file">
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>