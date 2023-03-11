<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('articles')->insert([
        //     'title' => 'Article 2',
        //     'author' => 'Author 2',
        //     'description' => 'Article description 2'
        // ]);

        // DB::table('articles')->insert([
        //     'title' => 'Article 3',
        //     'author' => 'Author 3',
        //     'description' => 'Article description 3'
        // ]);

        Articles::factory()->count(50)->create();
    }

}
