

<?php $__env->startSection('title', 'Lista Pacjentów'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto mt-10 p-6 bg-white dark:bg-gray-900 shadow rounded">

    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Lista Pacjentów</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
<!-- Formularz wyszukiwania -->
<form method="GET" class="mb-6 flex justify-end">
    <input
        type="text"
        name="search"
        placeholder="Szukaj po imieniu zwierzaka..."
        value="<?php echo e($search ?? ''); ?>"
        class="px-4 py-2 border rounded w-1/3"
    >
    <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Szukaj
    </button>
</form>

    <!-- Tabela 1: Do akceptacji -->
    <h2 class="text-xl font-semibold mb-3 mt-4 text-indigo-700">Do akceptacji</h2>
    <table class="w-full table-auto border-collapse text-sm mb-10">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
                <th class="p-2 text-left">Imię właściciela</th>
                <th class="p-2 text-left">Imię zwierzaka</th>
                <th class="p-2 text-left">Data wizyty</th>
                <th class="p-2 text-left">Akceptuj</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $appointments->where('status', 'pending'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="p-2"><?php echo e($appointment->owner_name); ?></td>
                    <td class="p-2"><?php echo e($appointment->pet_name); ?></td>
                    <td class="p-2"><?php echo e(\Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i')); ?></td>
                    <td class="p-2">
                        <form action="<?php echo e(route('pacjenci.potwierdz', $appointment->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 text-sm w-full">✔️ Potwierdź</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Brak pacjentów do zatwierdzenia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Tabela 2: Wszystkie (z możliwością usunięcia) -->
<h2 class="text-xl font-semibold mb-3 text-red-600">Wszyscy pacjenci (Usuń)</h2>
<table class="w-full table-auto border-collapse text-sm">
    <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
            <th class="p-2 text-left">Imię właściciela</th>
            <th class="p-2 text-left">Imię zwierzaka</th>
            <th class="p-2 text-left">Email</th>
            <th class="p-2 text-left">Telefon</th>
            <th class="p-2 text-left">Data wizyty</th>
            <th class="p-2 text-left">Status</th>
            <th class="p-2 text-left">Usuń</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $appointments->where('status', '!=', 'pending'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                <td class="p-2"><?php echo e($appointment->owner_name); ?></td>
                <td class="p-2"><?php echo e($appointment->pet_name); ?></td>
                <td class="p-2"><?php echo e($appointment->email); ?></td>
                <td class="p-2"><?php echo e($appointment->phone); ?></td>
                <td class="p-2"><?php echo e(\Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i')); ?></td>
                <td class="p-2">
                    <span class="<?php echo e($appointment->status === 'pending' ? 'text-yellow-600' : 'text-green-600'); ?> font-semibold">
                        <?php echo e($appointment->status === 'pending' ? 'Oczekuje' : 'Potwierdzona'); ?>

                    </span>
                </td>
                <td class="p-2">
                <form action="<?php echo e(route('pacjenci.usun', $appointment->id)); ?>" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego pacjenta?');">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm w-full">
        🗑 Usuń
    </button>
</form>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">Brak potwierdzonych pacjentów do wyświetlenia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/pacjenci/index.blade.php ENDPATH**/ ?>