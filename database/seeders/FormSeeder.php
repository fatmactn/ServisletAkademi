<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Form::create([
           'nameSurname' => 'Fatma Cetin',
           'mail' => 'fatma@gmail.com',
           'resumePath' => 'asd',
           'linkedinUrl' => 'linkedin.com/in/fatmacetinn',
           'isKvkk' => 0
        ]);
    }
}
