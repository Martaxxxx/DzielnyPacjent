@extends('layouts.app')

@section('title', 'Strona Główna')

@section('content')

<!-- Nagłówek -->
<section class="bg-white py-10">
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-black">Witamy w Przychodni Dzielny Pacjent</h1>
    </div>
</section>

<section class="relative bg-gray-100 py-6">
    <div class="flex justify-center">
        <img src="/img/klinika.png" alt="Przychodnia Dzielny Pacjent"
             class="max-w-full max-h-[600px] w-auto object-contain rounded-xl shadow-md">
    </div>
</section>

<!-- O nas -->
<section class="px-6 py-20 bg-gray-100 dark:bg-gray-800 text-center">
    <h2 class="text-3xl font-semibold mb-6">O nas</h2>
    <p class="max-w-3xl mx-auto text-gray-600 dark:text-gray-300 leading-relaxed">
        Jesteśmy nowoczesną placówką weterynaryjną z misją niesienia pomocy zwierzakom i wsparcia ich opiekunów.
        Oferujemy kompleksową opiekę medyczną, szczepienia, badania i mnóstwo serca!
    </p>
</section>

<!-- Zespół -->
<section class="px-6 py-20 text-center">
    <h2 class="text-3xl font-semibold mb-6">Nasz Zespół</h2>
    <div class="flex justify-center">
        <img src="/img/zespol.png" alt="Zespół" class="rounded-xl shadow-xl max-w-4xl">
    </div>
</section>

<!-- Kontakt -->
<section class="px-6 py-20 bg-gray-100 dark:bg-gray-800 text-center">
    <h2 class="text-3xl font-semibold mb-6">Kontakt</h2>

    <div class="max-w-2xl mx-auto text-gray-700 dark:text-gray-300 mb-6">
        <p>📍 ul. Zwierzakowa 12, 60-123 Poznań</p>
        <p>📞 +48 123 456 789</p>
        <p>📧 kontakt@dzielnypacjent.pl</p>
    </div>

    <div class="flex justify-center">
        <iframe
            src="https://www.google.com/maps?q=ul.+Zwierzakowa+12,+60-123+Poznań&output=embed"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="rounded-xl shadow-md max-w-4xl">
        </iframe>
    </div>
</section>

@endsection
