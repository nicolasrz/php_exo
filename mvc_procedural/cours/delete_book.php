<?php


$idBook = $_GET['id'];


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



$request = $pdo->prepare("DELETE FROM book WHERE id =:id");
$request->bindParam(':id', $idBook);
$result = $request->execute();

if(true === $result){
    echo "Le livre a bien été supprimé";
}else{
    echo "Une erreur est surevenue durant la suppression";
}
    ?>

<a href='index.php'>Revenir à la liste des livres</a>
