<?php
namespace App\Models;

use App\Models\SqlModel;

class AuthorModel extends SqlModel{

    public static function insertAuthor($author) {
        $query_author = "INSERT INTO author(name)VALUES(:author) ON CONFLICT(name) DO NOTHING RETURNING id;";
        $params_insert = [":author" => $author];
        $result = self::executeInsertAuthor($query_author, $params_insert);

        file_put_contents("php://stdout", " CONSOLE: [result]: " . print_r($result, true));
        

        return isset($result[0]['id']) ? $result[0]['id'] : null;
    }
}