<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 1; $i <= 195; $i++) {
            $data[] = [
                'country_name' => $faker->unique()->country(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
