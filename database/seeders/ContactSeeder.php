<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
           'phone' => '055555555',
           'mail' => 'random@gmail.com',
           'address' => 'ankara',
            'mapUrl' => 'asd.com'
        ]);
    }
}
