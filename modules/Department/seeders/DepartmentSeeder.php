<?php

namespace Modules\Department\seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Department\src\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
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
            DB::table('departments')->insert([
                'name' => $faker->name,
                'department_code' => $faker->unique()->regexify('[A-Za-z0-9]{10}'),
                'description' => $faker->text(50),
                'status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
