<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\SclassSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\SubjectSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SclassSeeder::class,
            SubjectSeeder::class,
            SectionSeeder::class,
            StudentSeeder::class
        ]);
    }
}
