<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
           'nameSurname' => 'fatma cetin',
           'degree' => 'intern',
           'imageUrl' => 'asds',
           'linkedinUrl' => 'fatmacetinn'
        ]);
    }
}
