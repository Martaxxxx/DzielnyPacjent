<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Seed użytkowników
        User::create([
            'name' => 'Recepcja',
            'email' => 'recepcja@klinika.pl',
            'password' => Hash::make('recepcja123'),
            'role' => 'recepcja',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Dr Weterynarz',
            'email' => 'weterynarz@klinika.pl',
            'password' => Hash::make('weterynarz123'),
            'role' => 'weterynarz',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Marta Kowalska',
            'email' => 'marta@test.pl',
            'password' => Hash::make('marta123'),
            'role' => 'pacjent',
            'email_verified_at' => now(),
        ]);

        // 🔹 Seed wizyt
        $this->call([
            ConfirmedAppointmentsSeeder::class,
        ]);
    }
}
