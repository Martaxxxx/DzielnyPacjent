<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wizyta potwierdzona</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2 style="color: #16a34a;">Wizyta potwierdzona!</h2>

    <p>Cześć {{ $appointment->owner_name }},</p>

    <p>Twoja wizyta z pacjentem <strong>{{ $appointment->pet_name }}</strong> została potwierdzona 🎉</p>

    <p><strong>📅 Termin:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</p>
    <p><strong>📍 Miejsce:</strong> Przychodnia Dzielny Pacjent</p>

    <p style="margin-top: 30px;">Do zobaczenia!<br>Zespół Dzielny Pacjent 🐾</p>
</body>
</html>
