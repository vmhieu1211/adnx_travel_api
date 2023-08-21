<?php

namespace Modules\Customer\seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Customer\src\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $faker = Factory::create();
        $limit = 40;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('customers')->insert([
                'customer_code' => $faker->unique()->regexify('[A-Za-z0-9]{10}'),
                'full_name' => $faker->name,
                'email' => $faker->email,
                'customer_name' => $faker->unique()->userName,
                'password' => bcrypt('123456'),
                'gender' => $faker->numberBetween(1,3),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $now->copy()->subYears(10)->format('Y-m-d'), $now->copy()->subYears(100)->format('Y-m-d')),
                'passport' => $faker->regexify('[A-Z0-9]{9}'),
                'phone_number' => $faker->phoneNumber(10),
                'address' => $faker->address,
                'status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
