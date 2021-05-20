<?php
declare(strict_types = 1);




function sayHello(string $prenom, int $age): string{
    return  "Bonjour " . $prenom . "   age : $age";

}

echo sayHello('Nicolas', 30);

