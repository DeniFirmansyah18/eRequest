<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Daftar Pengajuan</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Add any buttons or actions here -->
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-sm border border-gray-200 dark:border-gray-700">
            <table class="table-auto w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">OPD</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah Pengajuan</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">1</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Tenaga Kerja</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Kesehatan</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">3</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Pendidikan</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">3</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">4</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Pemberdayaan Masyarakat dan Desa</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">5</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Pekerjaan Umum dan Penataan Ruang</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">6</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">Dinas Perindustrian dan Perdagangan</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">2</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
