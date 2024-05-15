<?php

abstract class Figure
{
    abstract protected function area(): float;

    abstract protected function perimeter(): float;

    public function getArea(): float
    {
        return $this->area();
    }

    public function getPerimeter(): float
    {
        return $this->perimeter();
    }
}

?>
