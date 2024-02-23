<?php
namespace App\Models;

use App\Models\SqlModel;

class BookModel extends SqlModel{

    public static function fetch($page, $registros) {
        $offset = ($page - 1) * $registros;
        $query_book = "SELECT b.id, b.title, b.description, b.cover, b.publication_year, b.publisher, b.isbn, jsonb_agg(a.name) AS autores, jsonb_agg(c.name) AS categoria  FROM book b
            INNER JOIN book_author ba ON ba.id_book = b.id
            INNER JOIN author a ON a.id = ba.id_author
	        INNER JOIN book_category bc ON bc.id_book = b.id 
	        INNER JOIN category c ON bc.id_category = c.id 
        GROUP BY b.id 
        ORDER BY b.id ASC 
        LIMIT :registros OFFSET :offset;";

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