<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Recepta dla <?php echo e($appointment->pet_name); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?> 
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="font-sans p-8 text-gray-900 bg-white">

    <h1 class="text-2xl font-bold text-center mb-8">🐾 Recepta Weterynaryjna</h1>

    <div class="mb-6">
        <p><strong>Właściciel:</strong> <?php echo e($appointment->owner_name); ?></p>
        <p><strong>Zwierzę:</strong> <?php echo e($appointment->pet_name); ?></p>
        <p><strong>Data wizyty:</strong> <?php echo e(\Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i')); ?></p>
    </div>

    <div class="mb-6">
        <h2 class="font-semibold text-lg mb-1">Opis wizyty:</h2>
        <p class="whitespace-pre-line"><?php echo e($appointment->description); ?></p>
    </div>

    <div class="mb-6">
        <h2 class="font-semibold text-lg mb-1">Recepta:</h2>
        <p class="whitespace-pre-line"><?php echo e($appointment->prescription); ?></p>
    </div>

    <a href="<?php echo e(route('vet.wizyty')); ?>"
       class="no-print inline-flex items-center text-indigo-600 hover:underline text-sm mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Powrót do panelu
    </a>

    <script>
        window.onload = () => window.print();
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\rejestr_zwierzat\resources\views/vet/prescription.blade.php ENDPATH**/ ?>