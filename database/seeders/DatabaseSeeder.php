<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        $this->call(ContentSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(OfficeImageSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(UserAuthSeeder::class);
    }
}
