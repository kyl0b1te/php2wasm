<?php

namespace Pwasm;

use Pwasm\Formats\Presentable;
use Pwasm\Formats\WASM;
use Pwasm\Formats\WAT;

class Pwasm
{
    private $storage_path;

    public function __construct(string $storage_path)
    {
        $this->storage_path = $storage_path;
    }

    public function create(string $src): string
    {
        return $this->getWASM($this->getWAT($src));
    }

    public function getWAT(string $src): string
    {
        $wat = new WAT($src);
        return $this->save($this->getPath($src, 'wat'), $wat->create());
    }

    public function getWASM(string $src): string
    {
        return $this->save($this->getPath($src, 'wasm'), new WASM($src));
    }

    private function getPath(string $src, string $ext): string
    {
        $filename = str_replace(['.php', '.wat', '.wasm'], '', basename($src));
        return $this->storage_path . "$filename.$ext";
    }

    private function save($path, $data)
    {
        //file_put_contents($path, $data);
        //return $path;
        return $data;
    }
}