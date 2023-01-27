<?php

namespace Database\Seeders;

use App\Models\News;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();

        //$this->call(CategorySeeder::class);
        $this->call(AdminSeeder::class);
       // \App\Models\News::factory(15)->create();
        //$this->call(NewsSeeder::class);
    }
}
