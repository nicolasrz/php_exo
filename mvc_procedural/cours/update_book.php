<?php

$user = "php_exo";
$pass = "php_exo";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=php_exo', $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (Exception $e) {
    var_dump($e->getMessage());die();
}

$idBook = $_GET['id'];
$request = $pdo->prepare("SELECT * FROM book WHERE id =:id");
$request->bindParam(':id', $idBook);
$request->execute();
$book = $request->fetch();




if(isset($_POST['title'], $_POST['author']) && !empty($_POST['title']) && !empty($_POST['author'])){

    $title = $_POST['title'];
    $author = $_POST['author'];


    $request = $pdo->prepare("UPDATE book set title=:title, author=:author WHERE id =:id");
    $request->bindParam(':title', $title);
    $request->bindParam(':author', $author);
    $request->bindParam(':id', $idBook);
    $result = $request->execute();
    if($result === true){
        echo "<p> Le livre s'est correctement mis à jour</p>";
    }else{
        echo "<p> Une erreur est survenue</p>";
    }

}


?>
<form action="update_book.php?id=<?=$idBook;?>" method="POST">

    <label for="title">Titre</label>
    <input id="title" type="text" name="title" value="<?=$book['title'];?>">
    <label for="author">Auteur</label>
    <input id="author" type="text" name="author" value="<?= $book['author']; ?>">
    <button type="submit">Enregistrer</button>
</form>

<a href='index.php'>Revenir à la liste des livres</a>