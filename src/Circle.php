<?php

declare(strict_types=1);

require_once __DIR__ . '/Figure.php';
require_once __DIR__ . '/FigureInfo.php';

class Circle extends Figure
{
    use FigureInfo;

    private float $radius;

    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException("Radius must be a positive number.");
        }
        $this->radius = $radius;
    }

    protected function area(): float
    {
        return pi() * (pow($this->radius, 2));
    }

    protected function perimeter(): float
    {
        return 2 * pi() * $this->radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
}
