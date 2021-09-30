<?php

namespace Database\Seeders;

use App\Models\UserAuth;
use Illuminate\Database\Seeder;

class UserAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAuth::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 1 //admin
        ]);
    }
}
