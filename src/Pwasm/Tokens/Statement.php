<?php

namespace Pwasm\Tokens;

use PhpParser\Node\Expr;
use PhpParser\Node\Stmt;

class Statement extends Token
{
    public function transform($nodes)
    {
        $data = [];
        /* @param Stmt $node */
        foreach ($nodes as $node) {
            $data[] = $this->getExpression($node->expr);
        }
        return implode("\n", $data);
    }

    /**
     * @param Expr $expression
     * @return string
     */
    private function getExpression($expression): string
    {
        switch (get_class($expression)) {
            case Expr\BinaryOp\Plus::class:
                return 'i32.add';
            default:
                // todo : throw error ("Unsupported expression detected")
                return get_class($expression);
        }
    }
}