<?php

namespace Database\Seeders;

use App\Models\Sclass;
use Illuminate\Database\Seeder;

class SclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sclass::factory()->count(2)->create();
    }
}
