<?php

$int_2 = 0;
$float_2 = 0.001;
$boolTrue = true;
$array = array("Volvo", "BMW", "Toyota");
$stringEmpty = "";
$stringNotEmpty = "1e100";
$varNull = NULL;

var_dump($boolTrue == $stringNotEmpty); //TRUE
var_dump($boolTrue === $stringNotEmpty); //FALSE
var_dump($boolTrue === (bool)$stringNotEmpty); //TRUE
var_dump($boolTrue == (bool)$stringNotEmpty); //TRUE
var_dump($float_2 > $int_2); //TRUE
var_dump((int)$float_2 > $int_2); //FALSE
var_dump($float_2 == $int_2); //FALSE
var_dump((int)$float_2 == $int_2); //TRUE
var_dump($float_2 === $int_2); //FALSE
var_dump((int)$float_2 === $int_2); //TRUE
var_dump($stringEmpty != $varNull); //FALSE
var_dump($stringEmpty !== $varNull); //TRUE
var_dump($stringEmpty !== (string)$varNull); //FALSE
var_dump($array != $boolTrue); //FALSE
var_dump($array !== $boolTrue); //TRUE
var_dump((bool)$array !== $boolTrue); //FALSE
var_dump($float_2 <= $varNull); //FALSE
var_dump($float_2 <= (float)$varNull); //FALSE

?>
