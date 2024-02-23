<?php
namespace App\Models;

use App\Models\SqlModel;

class AuthorModel extends SqlModel{

    public static function insertAuthor($author) {
        $query_author = "INSERT INTO author(name)VALUES(:author) RETURNING id;";
        $params_insert = [":author" => $author];
        $result = self::executeInsertAuthor($query_author, $params_insert);

        return $result[0]['id'];
    }
}