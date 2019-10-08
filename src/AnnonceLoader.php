<?php

require_once SRC_DIR.'/Annonce.php';

class AnnonceLoader
{
    public function load(int $id): Annonce
    {
        return new Annonce();
    }
}
