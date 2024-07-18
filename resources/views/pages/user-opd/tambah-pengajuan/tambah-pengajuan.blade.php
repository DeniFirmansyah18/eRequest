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
                        Masukkan Nama Aplikasi:
                    </label>
                    <textarea name="nama_aplikasi" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="1">{{ old('nama_aplikasi') }}</textarea>
                    @error('nama_aplikasi')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Masukkan Gambaran Umum Aplikasi:
                    </label>
                    <textarea name="gambaran_umum" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">{{ old('gambaran_umum') }}</textarea>
                    @error('gambaran_umum')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Masukkan Jenis Pengguna:
                    </label>
                    <textarea name="jenis_pengguna" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">{{ old('jenis_pengguna') }}</textarea>
                    @error('jenis_pengguna')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Masukkan Fitur - Fitur:
                    </label>
                    <textarea name="fitur_fitur" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">{{ old('fitur_fitur') }}</textarea>
                    @error('fitur_fitur')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Detail Konsep Aplikasi:
                    </label>
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