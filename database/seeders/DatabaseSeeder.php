<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pengumumen;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Pengumumen::create([
            'title'=>'udin',
            'isi' =>'mantap parah'
        ]);
    }
}
