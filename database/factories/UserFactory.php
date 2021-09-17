<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name'     => $this->faker->name,
            'email'         => $this->faker->unique()->safeEmail,
            'phone_number'  =>$this->faker->unique()->phoneNumber,
            'password'      => bcrypt('123456'), // password
            'remember_token'=> Str::random(10),
            'email_verified'=> 1,
            'email_verified_at'=> \Carbon\Carbon::now(),
            'email_verification_token'=> Str::random(32),
        ];
    }
}
