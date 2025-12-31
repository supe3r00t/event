<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'info@amr-7.sa'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Aa123456@'),
                'is_admin' => true,
            ]
        );
    }
}
