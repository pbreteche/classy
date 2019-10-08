<?php

require_once SRC_DIR.'/Annonce.php';
require_once SRC_DIR.'/DatabaseConnexion.php';

class AnnonceLoader
{
    private $connexion;

    public function __construct(DatabaseConnexion $connexion)
    {
        $connexion->connect();
        $this->connexion = $connexion->getPdo();
    }

    public function load(int $id): Annonce
    {
        $statement = $this->connexion->prepare(
            'SELECT id, title, content, publishedAt FROM Annonce WHERE id=:id'
        );

        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $annonce = $statement->fetchObject(Annonce::class);
        var_dump($annonce);
        return $annonce;
    }
}
