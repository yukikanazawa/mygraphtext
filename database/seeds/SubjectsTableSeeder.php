<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            ['id' => 1, 'title' => '高校数学'],
            ['id' => 2, 'title' => '高校物理'],
            ['id' => 3, 'title' => '中学英語'],
            ['id' => 4, 'title' => '中学数学'],
            ['id' => 5, 'title' => '中学国語'],
            ['id' => 6, 'title' => '中学理科'],
            ['id' => 7, 'title' => '中学社会']
        ]);
    }
}
