<?php

use Illuminate\Database\Seeder;

class AnimeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $seeds = [
          ['name' => 'Kill la Kill', 'year' => '2013'],
          ['name' => 'Dragon Ball Super', 'year' => '2015'],
          ['name' => 'Food Wars', 'year' => '2016'],
        ];

        foreach ($seeds as $seed) {
          $anime = new App\Anime;

          $anime->name = $seed['name'];
          $anime->year = $seed['year'];

          $anime->save();
        }
    }
}
