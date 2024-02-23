<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\BookModel as Book;

class BookController{

    function get_book($request, $response, $args) {
        $query_params = $request->getQueryParams();

        $page = isset($query_params["page"]) ? $query_params["page"] : 1;
        $registros = isset($query_params["registros"]) ? $query_params["registros"] : 100;

        $result_array = [
            "total_libros" => Book::countTotalBooks(),
            "page" => $page,
            "registros" => $registros,
            "libros" => Book::fetch($page, $registros)
        ];

        $result_json = json_encode($result_array, JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result_json);
        return $response->withHeader('Content-Type', 'application/json');
    }
}