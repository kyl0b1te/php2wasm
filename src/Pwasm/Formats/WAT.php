<?php

namespace Pwasm\Formats;

use PhpParser\Error;
use PhpParser\ParserFactory;

class WAT implements Presentable
{
    public function __construct(string $src)
    {
        // todo : iterate AST and transform it to WAT
    }

    private function getAST(string $src)
    {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        try {
            // todo : add security tests
            return $parser->parse(file_get_contents($src));
        } catch (Error $error) {
            echo "Parse error: {$error->getMessage()}\n";
            return;
        }
    }

    public function getData()
    {
        return 1;
    }
}