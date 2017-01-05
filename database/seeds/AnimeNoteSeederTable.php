<?php

use Illuminate\Database\Seeder;

class AnimeNoteSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $seeds = [
          ['user_id' => '1', 'anime_id' => '1', 'body' => 'An Japanese Anime'],
        ];

        foreach ($seeds as $seed) {
          $anime = new App\AnimeNote;

          $animeNote->user_id = $seed['user_id'];
          $animeNote->anime_id = $seed['anime_id'];
          $animeNote->body = $seed['body'];

          $animeNote->save();
        }

    }
}
