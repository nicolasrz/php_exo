<?php

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

$title = $_POST['title'];
$author = $_POST['author'];

if(empty($title)){
    echo "<p>Le titre est manquant.</p>";
}


if(empty($author)){
    echo "<p>Le nom de l'auteur est manquant.</p>";
}

if(!empty($title) && !empty($author)){
        $request = $pdo->prepare("INSERT INTO book (title, author) VALUES (:title, :author)");
        $request->bindParam(':title', $title);
        $request->bindParam(':author', $author);
        $result = $request->execute();
        if($result === true){
            echo "<p> Le livre s'est correctement enregistré</p>";
        }else{
            echo "<p> Une erreur est survenue</p>";
        }
}