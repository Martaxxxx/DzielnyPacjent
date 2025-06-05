

<?php $__env->startSection('title', 'Edycja użytkownika'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('/img/3.png');">
    <!-- Przyciemnienie tła -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 bg-white bg-opacity-95 p-6 rounded shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edycja użytkownika</h2>

        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.uzytkownicy.update', $user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Imię i nazwisko</label>
                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Rola</label>
                <select name="role" class="w-full p-2 border rounded" required>
                    <?php $__currentLoopData = ['admin', 'recepcja', 'weterynarz', 'pacjent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rola): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rola); ?>" <?php if($user->role === $rola): echo 'selected'; endif; ?>><?php echo e(ucfirst($rola)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="<?php echo e(route('admin.index')); ?>" class="text-sm text-indigo-600 hover:underline">← Wróć</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/admin/edit.blade.php ENDPATH**/ ?>