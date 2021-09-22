<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        $this->call(categoryseeder::class);
        $this->call(publisherseeder::class);
        $this->call(authorseeder::class);
        $this->call(bookseeder::class);
    }
}
