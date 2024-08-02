<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script src="//unpkg.com/alpinejs" defer></script>




    <!-- Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }

    </script>
</head>
<body class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 flex items-center justify-center min-h-screen">

    <main class="bg-white dark:bg-gray-900 w-full max-w-md p-8 rounded-lg shadow-lg flex flex-col items-center">

        <!-- Logo -->
        <div class="flex flex-col items-center w-full">

            <div class="max-w-sm w-full px-4 py-8">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="mx-auto w-14 h-18">
                <?php echo e($slot); ?>

            </div>
        </div>

    </main>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scriptConfig(); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\eRequest\resources\views/layouts/authentication.blade.php ENDPATH**/ ?>