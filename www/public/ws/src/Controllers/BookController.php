<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\BookModel as Book;

require_once 'FunctionController.php';

class BookController{

    function get_book($request, $response, $args) {
        $http_code = 200; // Ok
        $result_array = array();
        $query_params = $request->getQueryParams();

        $page       = isset($query_params["page"])          ? $query_params["page"] : 1;
        $registros  = isset($query_params["registros"])     ? $query_params["registros"] : 100;
        $start_year = isset($query_params["start_year"])    ? $query_params["start_year"] : null;
        $end_year   = isset($query_params["end_year"])      ? $query_params["end_year"] : null;

        if ($start_year !== null && !isValidYear($start_year) || $end_year !== null && !isValidYear($end_year)) {
            $http_code = 400; // Código HTTP para Bad Request
            $result_array = array(
                "error" => array(
                    "code" => $http_code,
                    "mensaje" => "Año invalida",
                    "descripcion" => "Ingrese un año valido con formato YYYY."
                )
            );

            $response->getBody()->write(json_encode($result_array, JSON_UNESCAPED_UNICODE));
            return $response->withHeader('Content-Type', 'application/json')->withStatus($http_code);
        }
        
        if (!isValidNumeric($page) || !isValidNumeric($registros)) {
            $http_code = 400; // Código HTTP para Bad Request
            $result_array = array(
                "error" => array(
                    "code" => $http_code,
                    "mensaje" => "Ingrese valor númerico",
                    "descripcion" => "La variable page y registros deben ser númericos enteros mayor a 0."
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