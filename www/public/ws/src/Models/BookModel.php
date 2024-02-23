<?php
namespace App\Models;

use App\Models\SqlModel;

class BookModel extends SqlModel{

    public static function fetch($page, $registros) {
        $offset = ($page - 1) * $registros;
        $query_book = "SELECT * FROM book b ORDER BY b.id ASC LIMIT :registros OFFSET :offset;";
        $params_select = [":registros" => $registros, ":offset" => $offset];
        $result = self::executeFetchBooks($query_book, $params_select);

        return $result;
    }

    public static function countTotalBooks() {
        $query_count = "SELECT count(*) FROM book";
        $result = self::executeCountBooks($query_count);
        return $result[0]['count'];
    }
}


?>