<?php

namespace Database\Seeders;

use App\Models\Estate_type;
use App\Models\EstateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $types = [
            'Agricultural Land',
            'Market',
            'House',
            'Farm'
        ];
        foreach ($types as $type) {
            Estate_type::create([
                'type' => $type
            ]);
        }

    }
}
