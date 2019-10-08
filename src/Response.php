<?php

class Response
{
    private $body;

    private $status;

    public function __construct(string $body='', int $status=200)
    {
        $this->body = $body;
        $this->status = $status;
    }

    public function send()
    {
        http_response_code($this->status);

        if ($this->body) {
            echo $this->body;
        }
    }
}
