<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Detail</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Add any buttons or actions here -->
            </div>

        </div>

        <!-- Detail Content -->
        <div class="bg-gray-200 dark:bg-gray-800 shadow-md rounded px-6 pt-6 pb-1 mb-8">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Informasi Pengguna</h2>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Pengguna:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">admin XYZ</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        OPD:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">Dinas XYZ</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        No Telepon:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">08923131221</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Alamat Email:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">disnaker@mojokertokab.com</p>
                </div>
            </div>

            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Detail Permintaan</h2>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Nama Aplikasi:
                    </label>
                    <p class="text-gray-700 dark:text-gray-300">aplikasi XYZ</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Gambaran Umum Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Jenis Pengguna Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Fitur-fitur Aplikasi:
                    </label>
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                        Detail Konsep Aplikasi:
                    </label>
                    <input type="file" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600">
                </div>

                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Catatan Verifikator</h2>
                <div class="mb-4">
                    <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum.Lorem ipsum</textarea>
                </div>

                <div class="flex space-x-2 mb-4">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Terima
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Tolak
                    </button>
                </div>

                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Progres Aplikasi</h2>
                <textarea class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3">Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum.Lorem ipsum</textarea>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
        </div>
    </div>
</x-app-layout>