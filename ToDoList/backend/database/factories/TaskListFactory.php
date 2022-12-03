<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TaskList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskList>
 */
class TaskListFactory extends Factory
{
       /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {               
                return User::factory()->create()->id;
            },
            'title' => $this->faker->name,
            'status' => 0,
        ];
    }
}
