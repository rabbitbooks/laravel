<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');

        for ($i=0; $i<=1; $i++) {
            $catName = $faker->realText(10);

            $data[] = [
                "title" => $catName,
                "slug" => str_slug($catName),
            ];
        }

        return $data;
    }
}
