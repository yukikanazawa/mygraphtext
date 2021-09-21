<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['id' => 1, 'subject_id' => 6, 'field_id' => 1, 'category_id' => 1, 'title' => '光の屈折(凸レンズ)',
            'body' => 'https://www.geogebra.org/calculator/tggzrbah']
        ]);
    }
}
