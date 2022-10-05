<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = [
            [
                'firstName' => 'ahmad',
                'lastName' => 'hamdan',
                'phone' => '09555',
                'address' => 'damascus'
            ],
            ['firstName' => 'hussam',
                'lastName' => 'hamdan',
                'phone' => '09555',
                'address' => 'damascus'
            ],
            ['firstName' => 'khaled',
                'lastName' => 'hamdan',
                'phone' => '09555',
                'address' => 'damascus'
            ]
        ];
        foreach ($owners as $owner){
            Owner::create($owner);
        }
    }
}
