<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Title -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tambah Pengajuan</h1>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

        <!-- Formulir Pengajuan -->
        <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Detail Permintaan</h2>

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Aplikasi:
                    </label>
                    <textarea name="nama_aplikasi" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="1" placeholder="Contoh: Si Perpus">{{ old('nama_aplikasi') }}</textarea>
                    @error('nama_aplikasi')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Gambaran Umum Aplikasi:
                    </label>
                    <textarea name="gambaran_umum" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3" placeholder="Contoh: Aplikasi ini dirancang untuk memudahkan pengelolaan data buku, peminjaman, dan pengembalian di perpustakaan. Dilengkapi dengan fitur pencarian buku, notifikasi peminjaman, dan laporan statistik.">{{ old('gambaran_umum') }}</textarea>
                    @error('gambaran_umum')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Pengguna:
                    </label>
                    <textarea name="jenis_pengguna" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3" placeholder="Contoh: Admin, SuperAdmin">{{ old('jenis_pengguna') }}</textarea>
                    @error('jenis_pengguna')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Fitur - Fitur:
                    </label>
                    <textarea name="fitur_fitur" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3" placeholder="Contoh: 
1. Pencarian Buku: Memungkinkan pengguna mencari buku berdasarkan judul, penulis, atau ISBN.
2. Manajemen Peminjaman: Mengelola data peminjaman dan pengembalian buku.
3. Notifikasi: Mengirim notifikasi pengingat untuk pengembalian buku.
4. Laporan Statistik: Menyediakan laporan statistik peminjaman dan koleksi buku.">{{ old('fitur_fitur') }}</textarea>
                    @error('fitur_fitur')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Detail Konsep Aplikasi: 
                    </label>
                    <a href="{{ Storage::url('konsep_files/Desain Aplikasi eAudit.docx') }}" class="text-blue-500 flex items-center mt-4" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512 " class="w-12 h-12 mr-2 mb-4">
                            <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                        Unduh File Contoh Format Pengajuan
                    </a>
                    <input type="file" name="konsep_file" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">
                    @error('konsep_file')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="setuju" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Setuju dan Lanjutkan</span>
                    </label>
                    @error('setuju')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>