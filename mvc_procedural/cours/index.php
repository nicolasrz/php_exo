

<form action="save_book.php" method="POST">

    <label for="title">Titre</label>
    <input id="title" type="text" name="title">
    <label for="author">Auteur</label>
    <input id="author" type="text" name="author">
    <button type="submit">Enregistrer</button>
</form>

<?php


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
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th>ACtion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book) : ?>
    <tr>
        <td><?= $book['id'] ; ?></td>
        <td><?= $book['author'] ; ?></td>
        <td><?= $book['title'] ; ?></td>
        <td>
            - <a href="update_book.php?id=<?=$book['id'];?>">Modifier</a>
            - <a href="delete_book.php?id=<?=$book['id'];?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
