<?php

trait FigureInfo
{
    public function printInfo()
    {
        echo "Figure Information:" . PHP_EOL;
        echo "Area: " . $this->getArea() . PHP_EOL;
        echo "Perimeter: " . $this->getPerimeter() . PHP_EOL;
    }
}

?>
