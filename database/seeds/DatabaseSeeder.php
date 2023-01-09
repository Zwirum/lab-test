<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => Str::random(10),
            'anons' => Str::random(50),
            'text' => Str::random(250),
            'publish_date' => date('Y/m/d h:m:s')
        ]);
        DB::table('news')->insert([
            'title' => Str::random(10),
            'anons' => Str::random(50),
            'text' => Str::random(250),
            'publish_date' => date('Y/m/d h:m:s')
        ]);
        DB::table('tags')->insert([
            'name' => 'mem'
        ]);
        DB::table('tags')->insert([
            'name' => 'kek'
        ]);
        DB::table('tags')->insert([
            'name' => 'cheburek'
        ]);
    }
}
