<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class, 1)->create();
        factory(App\Category::class, 10)->create();
        factory(App\Experience::class, 6)->create();
        factory(App\Location::class, 5)->create();
        factory(App\Salary::class, 4)->create();
    }
}
