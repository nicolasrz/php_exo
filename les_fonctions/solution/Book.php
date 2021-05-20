<?php

include "Database.php";



function getBooks(){
    $connexion = getDatabase();
    $query = $connexion->prepare("SELECT * FROM book");
    $query->execute();
    $books = $query->fetchAll();
    return $books;
}

