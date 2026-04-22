<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
        ['title' => 'Bumi', 'author_id' => 1],
        ['title' => 'Laskar Pelangi', 'author_id' => 2],
        ['title' => 'Bumi Manusia', 'author_id' => 3],
        ['title' => 'Supernova', 'author_id' => 4],
        ['title' => 'Kambing Jantan', 'author_id' => 5],
        ]);
    }
}
