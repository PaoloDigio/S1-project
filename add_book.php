<?php
include __DIR__ . '/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno = $_POST['anno'];
    $genere = $_POST['genere'];

    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES ('$titolo', '$autore', $anno, '$genere')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Errore nell'inserimento del nuovo libro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>