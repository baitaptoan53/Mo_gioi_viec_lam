<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Buihuycuong\Vnfaker\VNFaker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'company_id' => Company::query()->inRandomOrder()->value('id'),
            'job_title' => $this->faker->jobTitle,
            'district' => $this->faker->address,
            'city' => $this->faker->city,
            'remove' => $this->faker->numberBetween(1,10),
            'is_partime' => $this->faker->boolean,
            'min_salary' => $this->faker->numberBetween(1000000, 10000000),
            'max_salary' => $this->faker->numberBetween(10000000, 100000000),
            'currency_salary' => $this->faker->numberBetween(1000, 10000000),
            'requirement' => $this->faker->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
            'start_date' => $this->faker->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
            'end_date' => $this->faker->date,
            'number_applicants' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->numberBetween(1, 10),
            'is_pinned' => $this->faker->boolean,
            'slug' => $this->faker->slug,
        ];
    }
}
