

<?php $__env->startSection('title', 'Panel Administratora'); ?>

<?php $__env->startSection('content'); ?>
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/3.png');">
    <!-- Przyciemnienie tła -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 max-w-6xl mx-auto mt-16 p-6 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-90 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white">Zarządzanie użytkownikami</h1>

        <?php if(session('success')): ?>
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse text-sm rounded shadow-sm">
                <thead class="bg-[#cb6ce6] text-white uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Imię</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Rola</th>
                        <th class="p-3 text-left">Akcje</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3"><?php echo e($user->id); ?></td>
                            <td class="p-3"><?php echo e($user->name); ?></td>
                            <td class="p-3"><?php echo e($user->email); ?></td>
                            <td class="p-3 capitalize"><?php echo e($user->role); ?></td>
                            <td class="p-3 space-x-2">
                                <a href="<?php echo e(route('admin.uzytkownicy.edytuj', $user->id)); ?>" class="text-indigo-600 hover:underline text-sm">Edytuj</a>

                                <a href="<?php echo e(route('admin.uzytkownicy.logi', $user->id)); ?>" class="text-gray-600 hover:underline text-sm">Logi</a>

                                <form action="<?php echo e(route('admin.uzytkownicy.usun', $user->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/admin/index.blade.php ENDPATH**/ ?>