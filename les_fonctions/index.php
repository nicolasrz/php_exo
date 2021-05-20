<?php

// J'inclus les fonctions.
include "Book.php";
include ('form_book.html');

// j'appelle ma fonction pour récupérer les livres
$books = getBooks();
//on affiche les livres.
include ('show_books.html');
