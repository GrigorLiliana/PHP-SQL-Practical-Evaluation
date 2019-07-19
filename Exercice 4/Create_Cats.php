<?php

require_once "Cat.php";
// use namespace :)
use MyEvaluation\Cat as Miau;

echo "<h1> You will see some cats...</h1>";

//create a cat
echo "First Cat:";
$cat1 = new Miau("Bicho Mau", 12, "Brown", "Male", "American Curl");
//display array with infos
var_dump($cat1->getInfos());

//second cat
echo "Second Cat:";
$cat2 = new Miau("Garfiel", 9, "Yellow", "Male", "Asian");
var_dump($cat2->getInfos());

//Third cat
echo "<br>Third Cat:<br>";
$cat3 = new Miau("Kitty", 0, "Blue", "Female", "Bombay");
var_dump($cat3->getInfos());

//wrong Cat
echo "<br>Wrong Cat:<br>";
$catError = new Miau("M", 20, "A", "B", "C");
var_dump($catError->getInfos());

