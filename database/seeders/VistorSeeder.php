<?php

namespace Database\Seeders;

use App\Domain\Vistor\Models\Vistor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VistorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vistor::factory()
        ->count(100)
        ->create();
    }
}
