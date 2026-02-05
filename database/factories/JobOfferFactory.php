<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $contractTypes = ['Full-time', 'Part-time', 'Contract', 'Internship'];
        $jobTitles = [
            'Senior Laravel Developer',
            'Frontend React Developer',
            'UI/UX Designer',
            'DevOps Engineer',
            'Marketing Manager',
            'Python Developer',
            'Mobile App Developer',
            'Data Scientist',
            'Project Manager',
            'Content Writer',
            'Backend Developer',
            'Full Stack Developer',
            'QA Engineer',
            'System Administrator',
            'Product Manager'
        ];
         return [
            'user_id' => 3,
            'title' => fake()->randomElement($jobTitles),
            'description' => fake()->paragraphs(3, true),
            'image' => 'https://via.placeholder.com/400x300/' . substr(fake()->hexColor(), 1) . '/ffffff?text=' . urlencode('Job Offer'),
            'contract_type' => fake()->randomElement($contractTypes),
            'company' => fake()->company(),
            'is_active' => true,
        ];
    }
}
