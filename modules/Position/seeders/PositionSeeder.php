<?php

namespace Modules\Position\seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Position\src\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('positions')->insert([
                'name' => $faker->name,
                'description' => $faker->text(50),
                'status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
