<?php

$hostname = 'localhost';
    $username = 'root'; 
    $password = ''; 
    $database = 'gestione_libreria';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn === false) {
        die("Errore di connessione al database: " . mysqli_connect_error());
    }


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM libri WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Errore nell'eliminazione del libro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>