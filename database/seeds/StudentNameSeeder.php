<?php

use Illuminate\Database\Seeder;

class StudentNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\StudentName', 10)->create();
    }
}
