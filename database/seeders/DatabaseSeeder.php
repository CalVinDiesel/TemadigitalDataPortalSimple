<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Administrator', 'email' => 'admin@3dhub.com', 'role' => 'admin'],
            ['name' => 'Regular User', 'email' => 'user@3dhub.com', 'role' => 'user'],
            ['name' => 'DisneyAdmin', 'email' => 'disneyadmin@3dhub.com', 'role' => 'admin'],
            ['name' => 'TemaUser', 'email' => 'temauser@3dhub.com', 'role' => 'user'],
            ['name' => 'TemaAdmin', 'email' => 'temaadmin@3dhub.com', 'role' => 'admin'],
            ['name' => 'DgdUser', 'email' => 'dgduser@3dhub.com', 'role' => 'user'],
            ['name' => 'DgdAdmin', 'email' => 'dgdadmin@3dhub.com', 'role' => 'admin'],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
                'role' => $userData['role'],
            ]);
        }
    }
}
