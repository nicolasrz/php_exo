<?php

function getConnection(){
    $user = "php_exo";
    $pass = "php_exo";

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=php_exo', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        echo "connexion reussie ! <br>";
    } catch (Exception $e) {
        var_dump($e->getMessage());die();
    }

    return $pdo;
}


function getAllBooks(){
    $pdo = getConnection();
    $query = $pdo->prepare("SELECT * FROM book");
    $query->execute();
    $books = $query->fetchAll();
    return $books;
}

function deleteBook($idBook){
    $pdo = getConnection();
    $request = $pdo->prepare("DELETE FROM book WHERE id =:id");
    $request->bindParam(':id', $idBook);
    $result = $request->execute();
    return $result;
}


function updateBook($idBook, $author, $title)
{
    $pdo = getConnection();
    $request = $pdo->prepare("UPDATE book set title=:title, author=:author WHERE id =:id");
    $request->bindParam(':title', $title);
    $request->bindParam(':author', $author);
    $request->bindParam(':id', $idBook);
    $result = $request->execute();
    return $result;
}


function getOneBook($idBook){
    $pdo = getConnection();

    $idBook = $_GET['id'];
    $request = $pdo->prepare("SELECT * FROM book WHERE id =:id");
    $request->bindParam(':id', $idBook);
    $request->execute();
    $book = $request->fetch();

    return $book;
}


function saveBook($author, $title){
    $pdo = getConnection();
    $request = $pdo->prepare("INSERT INTO book (title, author) VALUES (:title, :author)");
    $request->bindParam(':title', $title);
    $request->bindParam(':author', $author);
    $result = $request->execute();
    return $result;

}