<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Carbon;

class ConfirmedAppointmentsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = FakerFactory::create('pl_PL');

        $animals = [
            ['type' => 'Pies', 'breed' => ['Labrador', 'Owczarek niemiecki', 'Bulldog']],
            ['type' => 'Kot', 'breed' => ['Syjamski', 'Maine Coon', 'Brytyjski']],
            ['type' => 'Królik', 'breed' => ['Mini Lop', 'Angora', 'Rex']],
        ];

        $petNames = [
            'Reksio', 'Pimpek', 'Burek', 'Luna', 'Mila', 'Filemon',
            'Kropka', 'Tosia', 'Figa', 'Bąbel', 'Maks', 'Klakier', 'Zuzia'
        ];

        for ($i = 0; $i < 20; $i++) {
            $animal = $faker->randomElement($animals);
            $breed = $faker->randomElement($animal['breed']);

            Appointment::create([
                'owner_name' => $faker->firstName . ' ' . $faker->lastName,
                'pet_name' => $faker->randomElement($petNames),
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber,
                'appointment_date' => Carbon::parse('2025-06-05')->subDays(rand(1, 4))->setTime(rand(9, 17), 0),
                'reason' => $faker->randomElement([
                    'Wizyta kontrolna',
                    'Szczepienie',
                    'Zabieg chirurgiczny',
                    'Choroba przewlekła'
                ]),
                'status' => 'confirmed',
                'animal_type' => $animal['type'],
                'breed' => $breed,
                'age' => rand(1, 12),
                'weight' => $faker->randomFloat(1, 1.5, 40),
                'special_notes' => $faker->randomElement([
                    'Brak szczególnych uwag.',
                    'Uczulenie na penicylinę.',
                    'Wcześniejsza operacja.',
                    'Wrażliwy żołądek.'
                ]),
                'description' => $faker->randomElement([
                    'Pacjent zgłosił się na kontrolę po zabiegu.',
                    'Objawy: kaszel, brak apetytu i apatia.',
                    'Stan ogólny dobry, zalecono dalszą obserwację.',
                    'Zalecenia dietetyczne: ograniczenie białka.'
                ]),
                'prescription' => $faker->randomElement([
                    '1x dziennie: lek X przez 5 dni.',
                    'Maść miejscowo rano i wieczorem przez 7 dni.',
                    'Zastrzyki co 3 dni przez 2 tygodnie.',
                    'Tabletki przeciwzapalne przez 10 dni.'
                ]),
            ]);
        }
    }
}
