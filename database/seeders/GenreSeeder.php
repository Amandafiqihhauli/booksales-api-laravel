<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
        ['name' => 'Fiction'],
        ['name' => 'Science'],
        ['name' => 'History'],
        ['name' => 'Fantasy'],
        ['name' => 'Horror'],
        ['name' => 'Romance'],
        ['name' => 'Thriller'],
        ['name' => 'Mystery'],
        ['name' => 'Biography'],
        ['name' => 'Self-Help']
        ]);
    }
}
