<?php

namespace Database\Factories;

use App\Domains\User\Data\SettingsData;
use App\Domains\User\Enums\MemberRole;
use App\Domains\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static string $password = '1q2w3e4r';

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => MemberRole::User,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'settings' => new SettingsData(dark: true, drawer: true),
        ];
    }

    public function create(): User
    {
        return User::query()->create($this->data);
    }

//    public function toDto(): UserData
//    {
//        return UserData::from($this->data);
//    }
}
