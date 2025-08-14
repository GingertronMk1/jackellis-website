<?php

namespace Database\Seeders;

use App\Filament\Resources\CVResource;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (app()->isLocal()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@jackellis.online',
                'password' => bcrypt(12345)
            ]);
        }
    }
}
