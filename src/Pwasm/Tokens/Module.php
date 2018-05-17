<?php

namespace Pwasm\Tokens;

class Module extends Token
{
    protected $name = 'module';

    public function transform($nodes)
    {
        $data = ['(module'];
        foreach ($nodes as $node) {
            $token = Token::getToken($node);
            if (!$token) {
                continue;
            }
            $data[] = $token->transform($node);
        }
        $data[] = ')';
        return implode("\n", $data);
    }
}