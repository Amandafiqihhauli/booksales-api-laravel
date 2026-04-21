<?php

namespace App\Models;

class Genre {
    public static function all(): array {
        return [
            ['id' => 1, 'name' => 'Fiction'],
            ['id' => 2, 'name' => 'Science'],
            ['id' => 3, 'name' => 'History'],
            ['id' => 4, 'name' => 'Fantasy'],
            ['id' => 5, 'name' => 'Horror'],
            ['id' => 6, 'name' => 'Romance'],
            ['id' => 7, 'name' => 'Thriller'],
            ['id' => 8, 'name' => 'Mystery'],
            ['id' => 9, 'name' => 'Biography'],
            ['id' => 10, 'name' => 'Self-Help']
        ];
    }
}