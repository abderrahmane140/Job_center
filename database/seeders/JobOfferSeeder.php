<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobOffer;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        JobOffer::factory()->count(30)->create();
    }
}