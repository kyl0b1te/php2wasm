<?php

namespace Pwasm\Tokens;

class Result extends Token
{
    use Typed;

    public function transform($nodes)
    {
        return sprintf('(result %s)', $this->getType($nodes));
    }
}