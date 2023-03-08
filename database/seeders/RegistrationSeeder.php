<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registration::create([
            'full_name' => 'Test Test',
            'email' => 'test@test.com',
            'qr_code' => '111111',
        ]);
    }
}
