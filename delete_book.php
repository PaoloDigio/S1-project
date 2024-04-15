<?php
include __DIR__ . '/includes/db.php';

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