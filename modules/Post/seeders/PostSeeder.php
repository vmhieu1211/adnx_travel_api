<?php

namespace Modules\Post\seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\Post\src\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
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
        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->text(20),
                'content' => $faker->text(200),
                'sort' => $faker->numberBetween(1,100),
                'publish_date' => $faker->date($format = 'Y-m-d', $now->addDays(100), $now),
                'author_id' => $faker->numberBetween(1,40),
                'featured_image' => $faker->image,
                'status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
