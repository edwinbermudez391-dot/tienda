<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@urbanhaus.com'],
            [
                'name' => 'Admin URBAN HAUS',
                'email' => 'admin@urbanhaus.com',
                'password' => Hash::make('UrbanHaus2026'),
            ]
        );

        $this->call([
            PrendaSeeder::class,
        ]);
    }
}
