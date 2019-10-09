<?php


namespace App;


use App\database\AnnonceLoader;
use App\database\DatabaseConnexion;
use App\html\Annonce as AnnonceHtml;

class Controller
{

    /**
     * @var \App\database\DatabaseConnexion
     */
    private $connection;

    public function __construct(DatabaseConnexion $connection)
    {
        $this->connection = $connection;
    }

    public function index()
    {
        echo 'je suis dans index';
    }

    public function show(int $id): Response
    {
        $loader = new AnnonceLoader($this->connection);
        $annonce = $loader->load($id);
        $annonceHtml = new AnnonceHtml();
        return new Response($annonceHtml->build($annonce));
    }
}