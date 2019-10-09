<?php


namespace App\html;


class Annonce
{

    public function build(\App\Annonce $annonce): string
    {
        return <<<EOT
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annonces</title>
</head>
<body>
  <h1>$annonce->title</h1><div>$annonce->content</div>
</body>
</html>
EOT;
    }
}