<?php

namespace Pwasm\Tokens;

use PhpParser\Node\Identifier;

trait Typed
{
    protected function getType(Identifier $node)
    {
        switch ($node->name) {
            case 'int':
                return 'i32';
            default:
                // todo : check about default type
                return 'i32';
        }
    }
}