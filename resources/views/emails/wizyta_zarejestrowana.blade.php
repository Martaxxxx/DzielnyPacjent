<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Potwierdzenie zgłoszenia wizyty</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color: #4F46E5;">Dziękujemy za zgłoszenie wizyty w Dzielnym Pacjencie!</h2>

    <p>Twoja wizyta została pomyślnie zgłoszona i oczekuje na potwierdzenie przez recepcję.</p>

    <h4>Szczegóły zgłoszenia:</h4>
    <ul>
        <li><strong>Imię właściciela:</strong> {{ $appointment->owner_name }}</li>
        <li><strong>Imię zwierzaka:</strong> {{ $appointment->pet_name }}</li>
        <li><strong>Powód wizyty:</strong> {{ $appointment->reason }}</li>
        <li><strong>Data i godzina:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</li>
    </ul>

    <p>Oczekuj wiadomości z potwierdzeniem terminu.</p>

    <p style="margin-top: 30px;">Zespół Dzielny Pacjent 🐾</p>
</body>
</html>
