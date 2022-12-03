<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tasks;
use App\Models\TaskList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
       /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tasks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tasklist = TaskList::factory()->create();
        
        return [
            'user_id' => $tasklist['user_id'],
            'list_id' => $tasklist['id'],
            'title' => $this->faker->name,
            'status' => 0,
        ];
    }
}
