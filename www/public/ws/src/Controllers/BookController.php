<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\BookModel as Book;

class BookController{

    function get_book($request, $response, $args) {
        $http_code = 200; // Ok
        $result_array = array();
        $query_params = $request->getQueryParams();

        $page = isset($query_params["page"]) ? $query_params["page"] : 1;
        $registros = isset($query_params["registros"]) ? $query_params["registros"] : 100;

        if (!is_numeric($page) || !is_numeric($registros) || intval($page) != $page || intval($registros) != $registros || intval($page) <= 0 || intval($registros) <= 0) {
            $http_code = 400; // Código HTTP para Bad Request
            $result_array = array(
                "error" => array(
                    "code" => $http_code,
                    "mensaje" => "Ingrese valor númerico",
                    "descripcion" => "La variable page y registros deben ser númericos enteros."
                )
            );

            $response->getBody()->write(json_encode($result_array, JSON_UNESCAPED_UNICODE));
            return $response->withHeader('Content-Type', 'application/json')->withStatus($http_code);
        }


        $result_array = [
            "total_libros" => Book::countTotalBooks(),
            "page" => $page,
            "registros" => $registros,
            "libros" => Book::fetch($page, $registros)
        ];

        $response->getBody()->write(json_encode($result_array, JSON_UNESCAPED_UNICODE));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($http_code);
    }
}