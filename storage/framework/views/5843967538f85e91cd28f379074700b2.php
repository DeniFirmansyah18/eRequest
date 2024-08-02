<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <form action="<?php echo e(route('user_opd.daftarPengajuan')); ?>" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Cari pengajuan..." value="<?php echo e(old('search', $searchTerm)); ?>" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
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
                    <?php $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300"><?php echo e($loop->iteration); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300"><?php echo e($pengajuan->nama_aplikasi); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300"><?php echo e($pengajuan->progress); ?></td>
                        <td class="px-4 py-2 text-base text-gray-900 dark:text-gray-300">
                            <span class="<?php if($pengajuan->status == 'Disetujui'): ?> inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-base font-medium text-green-700 ring-1 ring-inset ring-green-600/20 <?php elseif($pengajuan->status == 'Ditolak'): ?> 
                                inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-base font-medium text-red-700 ring-1 ring-inset ring-red-600/10 <?php elseif($pengajuan->status == 'Selesai'): ?> 
                                inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-base font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10
                                <?php else: ?> inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-base font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 <?php endif; ?>">
                                <?php echo e($pengajuan->status); ?>

                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-300">
                            <div class="flex space-x-2">
                                <a href="<?php echo e(route('user_opd.detailPengajuan', $pengajuan->id)); ?>" class="bg-blue-500 text-white px-4 py-2 rounded">Detail</a>
                                <?php if($pengajuan->status != 'Disetujui' && $pengajuan->status != 'Selesai'): ?>
                                <a href="<?php echo e(route('user_opd.ubahPengajuan', $pengajuan->id)); ?>" class="bg-gray-500 text-white px-4 py-2 rounded">Ubah</a>
                                <form action="<?php echo e(route('user_opd.destroy', $pengajuan->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                                </form>   
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


        <div class="mt-4">
            <?php echo e($pengajuans->appends(['search' => $searchTerm])->links()); ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\eRequest\resources\views/pages/user-opd/daftar-pengajuan/daftar-pengajuan.blade.php ENDPATH**/ ?>