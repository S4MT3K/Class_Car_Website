<?php
#Polymorphismus
abstract class A{
    public CONST WORT = "WORT";
    public function sayHy()
    {
        $a = 44;
        echo "$a";
        echo "<br>";
        echo "Hello world";
    }
}

class English extends A
{
 #keine änderung der sayHy Methode
}

class Deutsch extends A
{
    public function sayHy()
    {
        echo "Haaallöööööchen";
    }
}

$english = new English();
$deutsch = new Deutsch();


#$english->sayHy();

$deutsch->sayHy();

echo A::WORT;

