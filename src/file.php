<?php

class File
{
    private string $path;
    private FileExtension $extension;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    private function getExtension(string $path): void
    {
        print_r(pathinfo($path));
        exit;
    }
}
