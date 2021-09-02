<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'subject_id' => 6, 'field_id' => 1, 'title' => '中１'],
            ['id' => 2, 'subject_id' => 6, 'field_id' => 1, 'title' => '中２'],
            ['id' => 3, 'subject_id' => 6, 'field_id' => 1, 'title' => '中３']
        ]);
    }
}
