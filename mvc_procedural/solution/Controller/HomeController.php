<?php
include('Model/BookModel.php');

function showAllBooks()
{
   $books = getAllBooks();
    include('View/show_books.html');
}

function showFormSaveBook()
{
    include('View/form_book.html');
}

function saveBookAction()
{
    $title = $_POST['title'];
    $author = $_POST['author'];

    if (isset($_POST['title'], $_POST['author']) && !empty($_POST['title']) && !empty($_POST['author'])) {
        $result = saveBook($title, $author);
        if($result === true){
            echo "<p> Le livre s'est correctement enregistré</p>";
        }else{
            echo "<p> Une erreur est survenue</p>";
        }
    }
}


function deleteBookAction()
{
    $idBook = $_GET['id'];
    $result = deleteBook($idBook);

    if($result === true) {
        echo "Le book a bien été supprimé !";
    }else{
        echo "un problème est survenue.";
    }
}

function showFormUpdate()
{
    $idBook = $_GET['id'];
    $book = getOneBook($idBook );
    include('View/form_update_book.html');
}

function updateBookAction()
{
    $idBook = $_GET['id'];

    if (isset($_POST['title'], $_POST['author']) && !empty($_POST['title']) && !empty($_POST['author'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $result = updateBook($idBook, $author, $title);
        if($result === true){
            echo "<p> Le livre s'est correctement mis à jour</p>";
        }else{
            echo "<p> Une erreur est survenue</p>";
        }
    }
}