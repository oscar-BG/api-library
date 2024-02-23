<?php
namespace App\Controllers;

use \Slim\Psr7\Response as rt;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\AuthorModel as Author;

class AuthorController {

    public function create_author(Request $request, Response $response, $args) {
        $body = $request->getParsedBody();
        $http_code = 200;
        
        if(empty($body) || !is_array($body)){
            $response->getBody()->write(json_encode(['error' => 'Cuerpo JSON no válido']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        
        $result_array = array();
        $author = trim(ucwords(strtolower($body['author'])));
        $author = preg_replace('/\s+/', ' ', $author);
        
        $id_author = Author::insertAuthor($author);

        if (is_null($id_author)) {
            $http_code = 409; // Conflict
            $result_array = array(
                "error" => array(
                    "code" => $http_code,
                    "mensaje" => "Autor existente",
                    "descripcion" => "El Autor ya se encuentra registrado"
                )
            );
        } else {
            $http_code = 201;
            $result_array = array(
                "resultado" => array(
                    "code" => $http_code,
                    "mensaje" => "Autor registrado",
                    "id_autor" => $id_author
                )
            );
        }


        $result_json = json_encode($result_array, JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result_json);
        return $response->withHeader('Content-Type', 'application/json')->withStatus($http_code);
    }
}