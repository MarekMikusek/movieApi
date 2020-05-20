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
        // $this->call(UsersTableSeeder::class);
        factory(App\Movie::class, 50)->create();
        factory(App\Genre::class, 5)->create();
        $genres = App\Genre::all();
        App\Movie::all()->each(function($movie) use ($genres){
            $movie->genres()->attach(
                $genres->random(rand(1,2))->pluck('id')->toArray()
            );
        });
    }
}
