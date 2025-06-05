<?php $__env->startSection('title', 'Rejestracja'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/img/1.png');">
    <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Załóż konto</h2>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Imię i nazwisko -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Imię i nazwisko</label>
                <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Hasło -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Hasło</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Potwierdź hasło -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Potwierdź hasło</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Przyciski -->
            <div class="flex justify-between items-center">
                <a href="<?php echo e(route('login')); ?>" class="text-sm text-indigo-600 hover:underline">
                    Masz już konto?
                </a>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
                    Zarejestruj się
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/auth/register.blade.php ENDPATH**/ ?>