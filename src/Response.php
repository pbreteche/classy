<?php

class Response
{
    public function send(string $body, int $status=200)
    {
        http_response_code($status);
        header('Content-type: text/plain');
        echo $body;
    }
}
