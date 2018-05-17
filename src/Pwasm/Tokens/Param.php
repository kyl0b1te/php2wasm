<?php

namespace Pwasm\Tokens;

class Param extends Token
{
    use Typed;

    /**
     * @param \PhpParser\Node\Param $nodes
     * @return string
     */
    public function transform($nodes)
    {
        return sprintf(
            '(param $%s %s)',
            $nodes->var->name,
            $this->getType($nodes->type)
        );
    }
}