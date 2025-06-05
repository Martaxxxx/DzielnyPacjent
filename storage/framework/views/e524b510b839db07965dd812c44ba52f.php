<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow py-4">
    <div class="w-full flex items-center justify-between px-4 sm:px-10">
        <!-- Logo maksymalnie z lewej -->
        <div>
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-extrabold text-indigo-600 hover:text-indigo-800">
                🐾 Dzielny Pacjent
            </a>
        </div>

        <!-- Burger (tylko mobile) -->
        <button @click="open = !open" class="md:hidden text-[#cb6ce6] focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Środek: linki nawigacyjne -->
        <div class="hidden md:flex flex-1 justify-center gap-8 text-base font-medium">
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role === 'recepcja'): ?>
                    <a href="<?php echo e(route('pacjenci.index')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition mr-20">Pacjenci</a>
                    <a href="<?php echo e(route('wizyty.umow')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition ml-12">Umów wizytę</a>
                <?php elseif(Auth::user()->role === 'weterynarz'): ?>
                    <a href="<?php echo e(route('vet.wizyty')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Weterynarza</a>
                <?php elseif(Auth::user()->role === 'pacjent'): ?>
                    <a href="<?php echo e(route('wizyty.umow')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Prawa: użytkownik + Wyloguj -->
        <div class="hidden md:flex items-center gap-6 text-base font-medium">
            <?php if(auth()->guard()->check()): ?>
                <span class="text-gray-600 dark:text-white"><?php echo e(Auth::user()->name); ?></span>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="text-[#cb6ce6] hover:underline transition">Wyloguj</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Zaloguj się</a>
                <a href="<?php echo e(route('register')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Zarejestruj się</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mobilne menu (widoczne tylko, gdy open = true) -->
    <div x-show="open" class="md:hidden px-4 mt-4 flex flex-col gap-4 text-base font-medium">
        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->role === 'recepcja'): ?>
                <a href="<?php echo e(route('pacjenci.index')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Pacjenci</a>
                <a href="<?php echo e(route('wizyty.umow')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
            <?php elseif(Auth::user()->role === 'weterynarz'): ?>
                <a href="<?php echo e(route('vet.wizyty')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Weterynarza</a>
            <?php elseif(Auth::user()->role === 'pacjent'): ?>
                <a href="<?php echo e(route('wizyty.umow')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
            <?php endif; ?>

            <span class="text-gray-600 dark:text-white"><?php echo e(Auth::user()->name); ?></span>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="text-[#cb6ce6] hover:underline transition">Wyloguj</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Zaloguj się</a>
            <a href="<?php echo e(route('register')); ?>" class="text-gray-700 hover:text-[#cb6ce6] transition">Zarejestruj się</a>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>