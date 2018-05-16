<?php

namespace Pwasm;

use PhpParser\Node;

abstract class Transformer
{
    abstract public function transform(Node $node);
}