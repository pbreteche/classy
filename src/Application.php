<?php

namespace App;


use App\database\AnnonceLoader;
use App\database\DatabaseConnexion;
use App\Exception\NotFoundException;
use App\html\Annonce as AnnonceHtml;

class Application
{
    public function run(): Response
    {
        $config = json_decode(file_get_contents(__DIR__.'/../config/database.json'));
        $connection = new DatabaseConnexion(
            $config->dsn,
            $config->username,
            $config->password
        );

        // regarder dans l'url
        $reader = new UrlReader();

        try {
            $config = $reader->parse();
            $controller = new Controller($connection);
            $response = call_user_func_array(
                [$controller, $config->getMethod()],
                $config->getArgs()
            );
        }
        catch(NotFoundException $e) {
            $response = new Response($e->getMessage(), 404);
        }

        return $response;
    }
}
