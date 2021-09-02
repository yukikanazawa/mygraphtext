<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            ['id' => 1, 'subject_id' => 6, 'title' => '物理'],
            ['id' => 2, 'subject_id' => 6, 'title' => '化学'],
            ['id' => 3, 'subject_id' => 6, 'title' => '生物'],
            ['id' => 4, 'subject_id' => 6, 'title' => '地学']
        ]);
    }
}
