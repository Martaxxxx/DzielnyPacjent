@extends('layouts.app')

@section('title', 'Strona Główna')

@section('content')

<!-- Nagłówek na białym tle -->
<section class="bg-white py-10">
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-black">Witamy w Przychodni Dzielny Pacjent</h1>
    </div>
</section>

<!-- HERO z tłem -->
<section class="relative h-screen bg-cover bg-center" style="background-image: url('/img/klinika.png');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full px-4">
        <div class="text-center text-white">
            <!-- Usunięty opis o profesjonalnej opiece -->
        </div>
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
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.451332660621!2d16.920980076960384!3d52.40953887200324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470445cfb8124e8b%3A0xb15c1ed3c9a088e9!2sPozna%C5%84!5e0!3m2!1spl!2spl!4v1711819200000!5m2!1spl!2spl" 
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="rounded-xl shadow-md max-w-4xl">
        </iframe>
    </div>
</section>

@endsection
