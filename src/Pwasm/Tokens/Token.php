<?php

namespace Pwasm\Tokens;

abstract class Token
{
    protected $name;

    protected $body = [];

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getName()
    {
        return $this->name;
    }
}