<?php

namespace Database\Factories;

use App\Models\Messages;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Messages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     "name" => "user2",
        //     "email" => "user2@gmail.com",
        //     "email_verified_at" => now(),
        //     "password" => bcrypt("1234"),
        //     "saldo" => 6000000,
        //     "isadmin" => 0,
        //     "service" => "service",
        //     "remember_token" => Str::random(10),
        // ];
        return [
            "from" => random_int(3, 5),
            "to" => random_int(3, 5),
            "message" => "Makan lom",
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                "email_verified_at" => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()->state(function (array $attributes, User $user) {
                return [
                    "name" => $user->name . '\'s Team',
                    "user_id" => $user->id,
                    "personal_team" => true,
                ];
            }),
            "ownedTeams"
        );
    }
}
