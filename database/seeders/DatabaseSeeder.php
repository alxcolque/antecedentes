<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
        Storage::deleteDirectory('avisos');
        Storage::makeDirectory('avisos');

        Storage::deleteDirectory('personas');
        Storage::makeDirectory('personas');

        $this->call(TodosSeeder::class);
    }
}
