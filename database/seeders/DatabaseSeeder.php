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
            ['email' => 'admin@urbanhaus.studio'],
            [
                'name' => 'Admin URBAN HAUS',
                'email' => 'admin@urbanhaus.studio',
                'password' => Hash::make('UrbanHaus2026'),
                'is_admin' => true,
            ]
        );

        $this->call([
            AdminUserSeeder::class,
            PrendaSeeder::class,
        ]);
    }
}
