<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Magasin::factory(1)->create();

        User::create([
            'name' => 'admin',
            'email' => 'email@email.com',
            'password' => Hash::make('password'),
        ]);

    }
}
