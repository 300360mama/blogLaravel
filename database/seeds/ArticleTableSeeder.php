<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(['article'=>'my article', 'author'=>'Jonh Smith']);
    }
}
