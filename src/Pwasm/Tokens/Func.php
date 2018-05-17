<?php

namespace Pwasm\Tokens;

use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Function_;

class Func extends Token
{
    /**
     * @param Function_ $nodes
     * @return string
     */
    public function transform($nodes)
    {
        $func = array_merge(
            $this->getDefinition($nodes),
            $this->getBody($nodes),
            $this->getExport($nodes)
        );

        return implode("\n", $func) . ')';
    }

    /**
     * @param Function_ $nodes
     * @return array
     */
    private function getDefinition($nodes): array
    {
        $definition = [];

        /* @param Param $param */
        foreach ($nodes->getParams() as $param) {
            $definition[] = self::getToken($param)->transform($param);
        }

        if (!empty($nodes->returnType)) {
            $definition[] = (new Result)->transform($nodes->returnType);
        }

        return [
            sprintf('(func $%s %s',
                $nodes->name,
                implode(' ', $definition)
            )
        ];
    }

    /**
     * @param Function_ $nodes
     * @return array
     */
    private function getBody($nodes): array
    {
        $data = [];
        /* @param Param $param */
        foreach ($nodes->getParams() as $param) {
            $data[] = 'get_local $' . $param->var->name;
        }

        $data[] = (new Statement)->transform($nodes->getStmts());
        return $data;
    }

    /**
     * @param Function_ $nodes
     * @return array
     */
    private function getExport($nodes): array
    {
        $upper = ucfirst($nodes->name);
        if (substr($upper, 0, 1) == substr($nodes->name, 0, 1)) {
            return [sprintf('(export "%s" (func $%s))', $nodes->name, $nodes->name)];
        }
        return [];
    }
}