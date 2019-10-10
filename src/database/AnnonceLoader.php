<?php

namespace App\database;

use App\Annonce;
use App\Exception\NotFoundException;

class AnnonceLoader
{
    private $connexion;

    public function __construct(DatabaseConnexion $connexion)
    {
        $this->connexion = $connexion->getPdo();
    }

    public function load(int $id): Annonce
    {
        $statement = $this->connexion->prepare(
            'SELECT id, title, content, publishedAt FROM Annonce WHERE id=:id'
        );

        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        $annonce = $statement->fetchObject(Annonce::class);

        if (!$annonce) {
            throw new NotFoundException('Cette annonce n\'existe pas');
        }

        return $annonce;
    }

    public function loadAll(): array
    {
        $statement = $this->connexion->prepare(
            'SELECT id, title, content, publishedAt FROM Annonce'
        );
        $statement->execute();

        $annonces = $statement->fetchAll(\PDO::FETCH_CLASS, Annonce::class);

        return $annonces;
    }
}
