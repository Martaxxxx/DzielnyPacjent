<nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow px-10 py-4 flex justify-between items-center">
    <!-- Logo -->
    <div>
        <a href="<?php echo e(url('/')); ?>" class="text-2xl font-extrabold text-indigo-600 hover:text-indigo-800 flex items-center gap-2">
            🐾 Dzielny Pacjent
        </a>
    </div>

    <!-- Menu -->
    <div class="flex items-center gap-6 text-sm">
        <?php if(auth()->guard()->check()): ?>
            <!-- DARK MODE TOGGLE -->
            <button id="theme-toggle" class="text-gray-700 hover:text-indigo-600 transition text-xl" title="Zmień tryb">
                🌙
            </button>

            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Strona Główna</a>

            <?php if(Auth::user()->role === 'recepcja' || Auth::user()->role === 'weterynarz'): ?>
                <a href="<?php echo e(route('pacjenci.index')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Pacjenci</a>
            <?php endif; ?>

            <a href="<?php echo e(route('wizyty.umow')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Umów wizytę</a>

            <?php if(Auth::user()->role === 'weterynarz'): ?>
                <a href="<?php echo e(route('vet.wizyty')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Panel Weterynarza</a>
            <?php endif; ?>

            <span class="text-gray-600 dark:text-white font-medium">
                <?php echo e(Auth::user()->name); ?>

            </span>

            <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?>
                <button class="text-red-600 hover:underline">Wyloguj</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Zaloguj się</a>
            <a href="<?php echo e(route('register')); ?>" class="text-gray-700 hover:text-indigo-600 transition">Zarejestruj się</a>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>