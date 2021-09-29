<?php

namespace Database\Seeders;

use App\Models\OfficeImage;
use Illuminate\Database\Seeder;

class OfficeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfficeImage::create([
            'imageUrl' => 'asd.image',
            'title' => 'ofis'
        ]);
    }
}
