<?php

namespace Pwasm\Tokens;

use PhpParser\Node;

abstract class Token
{
    protected $name;

    protected $body = [];

    private static $transformers = [
        Node\Stmt\Function_::class => Func::class,
        Node\Param::class => Param::class,
        Node\Stmt\Return_::class => Result::class,
    ];

    public static function getToken(Node $node): ?Token
    {
        $class = get_class($node);
        if (!isset(self::$transformers[$class])) {
            return null;
        }
        return new self::$transformers[$class];
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract public function transform($nodes);
}