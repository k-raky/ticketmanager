<?php

namespace Database\Seeders;

use App\DesktopPassword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesktopPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = [
            [
                'id'             => 1,
                'value'           => null,
            ],
        ];

        DesktopPassword::insert($password);
    }
}
