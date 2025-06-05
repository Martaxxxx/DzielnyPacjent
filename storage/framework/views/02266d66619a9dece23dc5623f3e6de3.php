

<?php $__env->startSection('title', 'Edycja Wizyty'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-900 shadow rounded">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Edycja wizyty: <?php echo e($appointment->pet_name); ?></h1>

    <form method="POST" action="<?php echo e(route('vet.zapisz', $appointment->id)); ?>">
        <?php echo csrf_field(); ?>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Rodzaj zwierzęcia</label>
            <input type="text" name="animal_type" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="<?php echo e(old('animal_type', $appointment->animal_type)); ?>">
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Rasa</label>
            <input type="text" name="breed" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="<?php echo e(old('breed', $appointment->breed)); ?>">
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Wiek</label>
            <input type="text" name="age" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="<?php echo e(old('age', $appointment->age)); ?>">
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Waga (kg)</label>
            <input type="text" name="weight" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="<?php echo e(old('weight', $appointment->weight)); ?>">
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Szczegóły specjalne</label>
            <textarea name="notes" rows="3" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white"><?php echo e(old('notes', $appointment->notes)); ?></textarea>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Opis wizyty</label>
            <textarea name="description" rows="5" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white"><?php echo e(old('description', $appointment->description)); ?></textarea>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Recepta</label>
            <textarea name="prescription" rows="4" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white"><?php echo e(old('prescription', $appointment->prescription)); ?></textarea>
        </div>

        
        <div class="flex justify-between items-center">
            <a href="<?php echo e(route('vet.wizyty')); ?>" class="text-sm text-indigo-600 hover:underline flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Wróć do listy
            </a>

            <button type="submit" class="bg-[#7ac759] hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i> Zapisz zmiany
            </button>

            <a href="<?php echo e(route('vet.recepta', $appointment->id)); ?>" target="_blank" class="bg-[#8B5CF6]  hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-2 print:hidden">
                <i data-lucide="printer" class="w-5 h-5"></i> Drukuj receptę
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/vet/edit.blade.php ENDPATH**/ ?>