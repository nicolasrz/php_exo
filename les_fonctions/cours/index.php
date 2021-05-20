<?php

// montre le formulaire pour ajouter un Book en base de données
include ('form_book.html');


//Affiche les livres en base de données

$user = "php_exo";
$pass = "php_exo";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=php_exo', $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "connexion reussie ! <br>";
} catch (Exception $e) {
    var_dump($e->getMessage());die();
}


$query = $pdo->prepare("SELECT * FROM book");
$query->execute();

// on récupère le résultat sous forme d'un tableau
$books = $query->fetchAll();

include ('show_books.html');
