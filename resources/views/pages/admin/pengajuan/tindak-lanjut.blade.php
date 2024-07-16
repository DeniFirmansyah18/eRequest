<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tindak Lanjut</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            </div>

        </div>

        <!-- Card -->
        <div class="bg-gray-100 dark:bg-gray-800 border-2 border-gray-400 dark:border-none p-4 rounded-lg">
            <div class="flex justify-between items-center mb-4 bg-gray-200 dark:bg-gray-700 p-2 rounded">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Dinas Tenaga Kerja</h2>
                    <p class="text-gray-600 dark:text-gray-400">Alamat: Jl.loremIpsum</p>
                </div>
            </div>

            <!-- List -->
            <ul>
                <li class="flex justify-between items-center border-t border-gray-300 dark:border-gray-700 py-2">
                    <div class="text-gray-800 dark:text-gray-100">Pengajuan sistem informasi keuangan</div>
                    <div class="flex items-center">
                        <span class="text-green-600 dark:text-green-400 font-semibold">Diterima</span>
                        <!-- <button class="ml-4 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 py-1 px-3 rounded">Detail</button> -->
                        <a href="{{ route('admin.detail.tindakLanjut') }}" class="button ml-4 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 py-1 px-3 rounded">Detail</a>

                    </div>
                </li>
                <li class="flex justify-between items-center border-t border-gray-300 dark:border-gray-700 py-2">
                    <div class="text-gray-800 dark:text-gray-100">Pengajuan aplikasi surat menyurat</div>
                    <div class="flex items-center">
                        <span class="text-red-600 dark:text-red-400 font-semibold">Ditolak</span>
                        <button class="ml-4 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 py-1 px-3 rounded">Detail</button>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</x-app-layout>