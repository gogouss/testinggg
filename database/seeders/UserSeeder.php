<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Create the demo account used by the store login form.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['name' => 'demo'],
            [
                'email' => 'demo@steam.test',
                'password' => 'password',
            ],
        );
    }
}
