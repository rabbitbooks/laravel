<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    private $categoriesArr = [
        [
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        [
            'title' => 'Политика',
            'slug' => 'politics'
        ],
        [
            'title' => 'Covid19',
            'slug' => 'covid'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {
        foreach ($this->categoriesArr as $item) {
            $data[] = [
                'title' => $item['title'],
                'slug' => $item['slug'],
            ];
        }
        return $data;
    }
}
