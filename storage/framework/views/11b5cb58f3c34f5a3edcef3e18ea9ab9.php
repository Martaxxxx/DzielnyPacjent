<?php $__env->startSection('title', 'Zaloguj się'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/img/1.png');">
    <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Zaloguj się do Dzielnego Pacjenta</h2>

        <?php if(session('status')): ?>
            <div class="mb-4 text-green-600 font-semibold">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
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

            <!-- Zapamiętaj mnie -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember_me" name="remember"
                       class="mr-2 border-gray-300 rounded text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label for="remember_me" class="text-sm text-gray-600">Zapamiętaj mnie</label>
            </div>

            <!-- Przyciski -->
            <div class="flex justify-between items-center">
                <?php if(Route::has('password.request')): ?>
                    <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-indigo-600 hover:underline">
                        Nie pamiętasz hasła?
                    </a>
                <?php endif; ?>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
                    Zaloguj się
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/auth/login.blade.php ENDPATH**/ ?>