<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wizyta została odrzucona</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color: #DC2626;">Przepraszamy – Twoja wizyta została odrzucona</h2>

    <p>Z przykrością informujemy, że Twoje zgłoszenie wizyty w Dzielnym Pacjencie zostało odrzucone.</p>

    <h4>Szczegóły zgłoszenia:</h4>
    <ul>
        <li><strong>Imię właściciela:</strong> {{ $appointment->owner_name }}</li>
        <li><strong>Imię zwierzaka:</strong> {{ $appointment->pet_name }}</li>
        <li><strong>Powód wizyty:</strong> {{ $appointment->reason }}</li>
        <li><strong>Data i godzina:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</li>
    </ul>

    <p>Powód odrzucenia może być związany z brakiem dostępnych terminów lub innymi ograniczeniami.</p>
    <p>Zachęcamy do ponownego umówienia wizyty w innym terminie.</p>

    <p style="margin-top: 30px;">Zespół Dzielny Pacjent 🐾</p>
</body>
</html>
