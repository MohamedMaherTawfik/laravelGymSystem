<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Members;
use App\Models\classes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classesRegestration>
 */
class ClassesRegestrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'members_id'=>$this->faker->numberBetween(1, Members::count()),
            'classes_id'=>$this->faker->numberBetween(1,classes::count()),
        ];
    }
}
