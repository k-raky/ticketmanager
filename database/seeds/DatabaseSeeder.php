<?php

use App\DesktopPassword;
use Database\Seeders\DesktopPasswordSeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $this->call([
            DesktopPasswordSeeder::class
        ]);

    }
}
