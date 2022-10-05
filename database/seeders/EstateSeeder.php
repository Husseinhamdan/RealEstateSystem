<?php

namespace Database\Seeders;

use App\Models\Estate;
use App\Models\Estate_type;
use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $estates = [
            ['owner_id' =>1,
                'type_id' => 1,
                'space' => '500',
                'description' => 'inside city',
                'location' => 'damascus',
                'price' => '255$'],
            ['owner_id' => 1,
                'type_id' => 2,
                'space' => '200',
                'description' => 'countryside damascus',
                'location' => 'anything',
                'price' => '255$'],
            ['owner_id' => 2,
                'type_id' => 3,
                'space' => '300',
                'description' => 'enjoy place',
                'location' => 'any thting',
                'price' => '555$']
        ];
        foreach ($estates as $estate) {
            Estate::create($estate);
        }
    }
}
