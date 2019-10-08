<?php

require_once SRC_DIR.'/AnnonceLoader.php';
require_once SRC_DIR.'/DatabaseConnexion.php';
require_once SRC_DIR.'/Response.php';
require_once SRC_DIR.'/UrlReader.php';

class Application
{
    public function run(): Response
    {
        $config = json_decode(file_get_contents(SRC_DIR.'/../config/database.json'));
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
            $response = new Response('coucou, ça marche');
        }
        catch(Exception $e) {
            $response = new Response('Cette page n\'existe pas', 404);
        }

        return $response;
    }
}
