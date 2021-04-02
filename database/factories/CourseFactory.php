<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        return [
            'title' => $title ,
            'slug' => Str::slug($title) ,
            'brief' => $this->faker->sentence(5) ,
            'description' => $this->faker->text() ,
            'duration' => rand(1,3).' Week' ,
            'location' => 'Cairo, Egypt' ,
            'category_id' => rand(1,10) ,
            'level_id' => rand(1,3) ,
            'add_by' => 1 ,
        ];
    }
}
