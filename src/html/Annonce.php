<?php


namespace App\html;


class Annonce
{

    public function build(\App\Annonce $annonce): string
    {
        ob_start();
        include APP_DIR.'/templates/annonce.phtml';
        return ob_get_clean();
    }
}