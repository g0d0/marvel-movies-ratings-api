<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MoviesSeeder::class,
        ]);

        User::factory()->create([
            'email' => 'admin@newway.com',
            'password' => bcrypt('qwe123'),
        ]);

        User::factory()->create([
            'email' => 'pedro@newway.com',
            'password' => bcrypt('qwe123'),
        ]);

        User::factory()->create([
            'email' => 'antonio@newway.com',
            'password' => bcrypt('qwe123'),
        ]);
    }
}
