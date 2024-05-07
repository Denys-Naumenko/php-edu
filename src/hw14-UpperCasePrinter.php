<?php

class UpperCasePrinter extends Printer
{

    public function print()
    {
        echo strtoupper($this->text) . PHP_EOL;
    }
}

?>