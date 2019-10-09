<?php

namespace App;

use App\Exception\NotFoundException;

class UrlReader
{
    public function parse(): PageConfig
    {
        // découpe de l'url sur les "/"
        $path = trim($_SERVER['REQUEST_URI'], '/');
        $uriParts = explode('/', $path);
        
        return $this->match($uriParts);
    }

    private function match(array $parts): PageConfig
    {
        // url de la form "annonce"
        if (count($parts) === 1
            && $parts[0] === 'annonce'
        ) {
            return new PageConfig([
                'method' => 'index',
                'args' => [],
            ]);
        }
        // url de la form "annonce/<numéro>"
        if (count($parts) === 2
            && $parts[0] === 'annonce'
            && is_numeric($parts[1])
        ) {
            return new PageConfig([
                'method' => 'show',
                'args' => ['id' => intval($parts[1])],
            ]);
        }

        // pas de format d'url trouvé
        throw new NotFoundException('URL non reconnue');
    }
}
