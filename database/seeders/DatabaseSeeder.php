<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path_schema = 'resources/sql/schema.sql';
        DB::unprepared(file_get_contents($path_schema));

        $path_population = 'resources/sql/population.sql';
        DB::unprepared(file_get_contents($path_population));
        $this->command->info('Database seeded!');
    }
}
