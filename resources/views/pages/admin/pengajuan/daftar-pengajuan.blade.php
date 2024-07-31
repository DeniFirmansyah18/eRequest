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
                <form action="{{ route('admin.daftarPengajuan') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari pengajuan..." value="{{ old('search', $searchTerm) }}" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Cari</button>
                </form>
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="table-auto w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Aplikasi</th>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama OPD</th>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Progress</th>
                        <th class="px-4 py-2 text-left text-base font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Info</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($pengajuan as $index => $item)
                    <tr>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">{{ $item->nama_aplikasi }}</td>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">{{ $item->user->name }}</td>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">
                            <span class="@if($item->status == 'Disetujui') inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-base font-medium text-green-700 ring-1 ring-inset ring-green-600/20 @elseif($item->status == 'Ditolak') 
                                inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-base font-medium text-red-700 ring-1 ring-inset ring-red-600/10 
                                @else inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-base font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">{{ $item->progress }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">
                            <div class="flex space-x-2">
                                <a href="javascript:void(0)" class="bg-red-500 text-white px-4 py-2 rounded" onclick="openModal('{{ $item->id }}')">Progress</a>
                                <a href="{{ route('admin.detail.tindakLanjut', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Detail</a>
                            </div>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $pengajuan->appends(['search' => $searchTerm])->links() }}
        </div>
    </div>

    <!-- Modal for Progress -->
    <div id="progress-modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="" method="POST" id="progress-form">
                    @csrf
                    <div class="bg-white dark:bg-gray-700 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Progres Aplikasi</h2>
                        <textarea name="progress" id="progress-textarea" class="w-full px-3 py-2 text-gray-700 dark:text-gray-300 border rounded-lg focus:outline-none bg-gray-200 dark:bg-gray-600" rows="3"></textarea>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="submitProgress()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                            Simpan
                        </button>
                        <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 mr-2">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openModal(id) {
            $('#progress-modal').removeClass('hidden');
            $('#progress-form').attr('action', '{{ route("admin.pengajuan.updateProgress", "") }}/' + id);
    
            // Fetch progress data and fill the textarea
            $.ajax({
                url: '{{ route("admin.pengajuan.getProgress", "") }}/' + id,
                method: 'GET',
                success: function(data) {
                    $('#progress-textarea').val(data.progress);
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    
        function closeModal() {
            $('#progress-modal').addClass('hidden');
            $('#progress-textarea').val(''); // Clear the textarea
        }
    
        function submitProgress() {
            const form = $('#progress-form');
            const action = form.attr('action');
            const formData = form.serialize();
    
            $.ajax({
                url: action,
                method: 'POST',
                data: formData,
                success: function(data) {
                    if (data.success) {
                        closeModal();
                        alert('Progress berhasil diupdate');
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat mengupdate progress');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    </script>
</x-app-layout>