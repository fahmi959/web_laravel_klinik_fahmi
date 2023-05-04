<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1; $i<=20; $i++){
            DB::table('pasien')->insert([
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_masuk' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'telepon' => $faker->unixTime($max = 'now'),
                'penyakit' => $faker->jobTitle,
                'alamat' => $faker->city,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
    }
}
