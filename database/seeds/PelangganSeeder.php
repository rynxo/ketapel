<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");

        for ($i = 1; $i <= 180; $i++) {
            DB::table('pelanggan')->insert([
                'namaPelanggan' => $faker->word(),
                'alamatPelanggan' => $faker->sentence(3),
                'email' => $faker->email(),
                'noHp' => $faker->randomDigit(),
                'id_layanan' => $faker->randomElement(['1', '2']),
                'fotoRumah' => $faker->imageUrl(),
            ]);
        }
    }
}
