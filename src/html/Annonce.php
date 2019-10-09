<?php


namespace App\html;


class Annonce
{

    public function build(\App\Annonce $annonce): string
    {
        return '<h1>'.$annonce->title.'</h1><div>'.$annonce->content.'</div>';
    }
}