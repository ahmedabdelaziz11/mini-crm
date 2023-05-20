<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'company_id' => Company::pluck('id')[$this->faker->numberBEtween(1,Company::count() -1)],
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->tollFreePhoneNumber(),

            
        ];
    }
}
