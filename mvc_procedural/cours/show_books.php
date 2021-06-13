<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($books as $book) : ?>
        <tr>
            <td><?php echo $book['id'] ;?></td>
            <td><?php echo $book['title'] ;?></td>
            <td><?php echo $book['author'] ;?></td>
            <td>
                <a href="update_book.php?id=<?=$book['id'];?>">Modifier</a>
                -
                <a href="delete_book.php?id=<?=$book['id'];?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>