<?php


namespace App\html;


class Annonce
{
    public function loadTemplate(string $path, array $data)
    {
        extract($data);
        ob_start();
        include APP_DIR.$path;
        return ob_get_clean();
    }
}