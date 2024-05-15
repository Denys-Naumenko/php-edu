<?php

declare(strict_types=1);

require_once __DIR__ . '/Figure.php';
require_once __DIR__ . '/FigureInfo.php';

class Rectangle extends Figure
{
    use FigureInfo;

    private float $length;
    private float $width;

    public function __construct(float $length, float $width)
    {
        if ($length <= 0 || $width <= 0) {
            throw new InvalidArgumentException("Length and width must be positive numbers.");
        }
        $this->length = $length;
        $this->width = $width;
    }

    protected function area(): float
    {
        return $this->length * $this->width;
    }

    protected function perimeter(): float
    {
        return ($this->length + $this->width) * 2;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

}


?>