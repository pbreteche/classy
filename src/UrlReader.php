<?php

class UrlReader
{

    public function parse()
    {
        // découpe de l'url sur les "/"
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $uriParts = explode('/', $path);
        
        if ($this->match($uriParts)) {
            return $uriParts[1];
        }

        // pas de format d'url trouvé
        throw new Exception('URL non reconnue');
    }

    private function match(array $parts)
    {
        // url de la form "annonce/<numéro>" ?
        return count($parts) === 2
                && $parts[0] === 'annonce'
                && is_numeric($parts[1]);
    }
}
