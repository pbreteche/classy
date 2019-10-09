<?php

namespace App;


use App\Exception\NotFoundException;
use App\html\Annonce;

class Application
{
    public function run(): Response
    {
        $config = json_decode(file_get_contents(__DIR__.'/../config/database.json'));
        $connexion = new DatabaseConnexion(
            $config->dsn,
            $config->username,
            $config->password
        );

        // regarder dans l'url
        $reader = new UrlReader();

        try {
            $id = $reader->parse();
            $loader = new AnnonceLoader($connexion);
            $annonce = $loader->load($id);
            $annonceHtml = new Annonce();
            $response = new Response($annonceHtml->build($annonce));
        }
        catch(NotFoundException $e) {
            $response = new Response($e->getMessage(), 404);
        }

        return $response;
    }
}
