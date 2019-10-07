<?php

class UrlReader
{

    public function parse()
    {
        echo $_SERVER['REQUEST_URI'];

        $uriParts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $annonceUri = count($uriParts) === 2
                && $uriParts[0] === 'annonce'
                && is_numeric($uriParts[1]);
        
        if ($annonceUri) {
            return $uriParts[1];
        }

        throw new Exception('URL non reconnue');
    }
}
