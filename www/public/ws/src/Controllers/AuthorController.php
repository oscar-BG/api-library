<?php
namespace App\Controllers;

use \Slim\Psr7\Response as rt;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\AuthorModel as Author;

class AuthorController {

    public function create_author(Request $request, Response $response, $args) {
        $body = $request->getParsedBody();
        
        if(empty($body) || !is_array($body)){
            $response->getBody()->write(json_encode(['error' => 'Cuerpo JSON no válido']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        
        $author = $body['author'];

        $result_array = [
            "status" => true,
            "id_autor" => Author::insertAuthor($author)
        ];

        $result_json = json_encode($result_array, JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result_json);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}