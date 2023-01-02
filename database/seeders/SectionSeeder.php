<?php

namespace Database\Seeders;

use App\Models\Section;
use Database\Factories\SectionFactory;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::factory()->count(10)->create();
    }
}
