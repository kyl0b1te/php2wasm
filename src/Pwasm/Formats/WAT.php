<?php

namespace Pwasm\Formats;

use PhpParser\ParserFactory;
use Pwasm\Tokens\Module;

class WAT
{
    private $path;

    public function __construct(string $src)
    {
        $this->path = $src;
    }

    public function create()
    {
        $ast = $this->getAST();
        $module = new Module();
        print_r($ast);
        return $module->transform($ast);
    }

    private function getAST()
    {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        // todo : add security tests
        return $parser->parse(file_get_contents($this->path));
    }
}