<?php
require(__DIR__ . '/vendor/autoload.php');
# require(__DIR__ . '/config/database.php');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;

use App\Controllers\BookController;
use App\Controllers\AuthorController;



$app = AppFactory::create();
$app->setBasePath("/ws");
$app->addBodyParsingMiddleware();

// Add Error Handling Middleware
// $app->addErrorMiddleware(true, false, false);

$app->get('/libros', BookController::class . ':get_book' );
$app->post('/crear-autor', AuthorController::class . ':create_author');

$app->run();