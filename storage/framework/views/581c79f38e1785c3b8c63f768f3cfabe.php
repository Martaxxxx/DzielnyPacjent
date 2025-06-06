<!DOCTYPE html>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
      x-data="{ theme: localStorage.theme || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') }"
      x-init="
        if(theme === 'dark'){
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
        $watch('theme', value => {
          localStorage.theme = value;
          document.documentElement.classList.toggle('dark', value === 'dark');
        });
      "
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Dzielny Pacjent')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">

    <!-- Nawigacja -->
    <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Główna zawartość -->
    <main class="p-4">

        <?php if(session('success')): ?>
            <div class="max-w-2xl mx-auto bg-green-100 border border-green-400 text-green-800 px-6 py-3 rounded shadow text-center mt-4">
                 <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/layouts/app.blade.php ENDPATH**/ ?>