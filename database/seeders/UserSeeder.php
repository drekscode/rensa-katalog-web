<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@rensa.id'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Rensa@23'),
                'email_verified_at' => now(),
            ]
        );
    }
}
