<?php

namespace App;

use App\database\AnnonceLoader;
use App\database\DatabaseConnexion;
use App\html\Annonce as AnnonceHtml;

class Controller
{
    /**
     * @var \App\database\AnnonceLoader
     */
    private $loader;

    /**
     * @var \App\html\Annonce
     */
    private $annonceHtml;

    public function __construct(DatabaseConnexion $connection)
    {
        $this->loader = new AnnonceLoader($connection);
        $this->annonceHtml = new AnnonceHtml();
    }

    public function index()
    {
        $annonces = $this->loader->loadAll();
        return new Response($this->annonceHtml->loadTemplate(
            '/templates/index.phtml', [
                'annonces' => $annonces,
            ]
        ));
    }

    public function show(int $id): Response
    {
        $annonce = $this->loader->load($id);
        return new Response($this->annonceHtml->loadTemplate(
            '/templates/annonce.phtml', [
                'annonce' => $annonce,
            ]
        ));
    }
}