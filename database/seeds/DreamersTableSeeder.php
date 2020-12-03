<?php

use App\Dreamer;
use Illuminate\Database\Seeder;

class DreamersTableSeeder extends Seeder
{
    public function run()
    {
        $dreamers = ['Futbolistas', 'Bomberos', 'Policias'];

        foreach ($dreamers as $dreamer) {
            Dreamer::create(['name' => $dreamer]);
        }
    }
}
