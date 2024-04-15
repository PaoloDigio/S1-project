<?php
    $hostname = 'localhost';
    $username = 'root'; 
    $password = ''; 
    $database = 'gestione_libreria';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn === false) {
        die("Errore di connessione al database: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM libri";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center display-1 mb-5">Libreria</h1>
        <h2 class="mb-3">Libri disponibili</h2>
        <ul class="list-group mb-5">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class='list-group-item'>
                        {$row['titolo']} di {$row['autore']} ({$row['anno_pubblicazione']}) - {$row['genere']}
                        <form action='elimina_libro.php' method='post' style='display: inline;'> 
                            <input type='hidden' name='id' value='{$row['id']}'> 
                            <button type='submit' class='btn btn-danger btn-sm ms-2'>Elimina</button>
                        </form>
                      </li>";
            }

            mysqli_close($conn);
            ?>
        </ul>
        <h2 class="mb-3">Aggiungi un nuovo libro</h2>
        <form action="aggiungi_libro.php" method="post" class="mb-4">
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" required>
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" class="form-control" id="autore" name="autore" required>
            </div>
            <div class="mb-3">
                <label for="anno" class="form-label">Anno di pubblicazione</label>
                <input type="number" class="form-control" id="anno" name="anno" required>
            </div>
            <div class="mb-3">
                <label for="genere" class="form-label">Genere</label>
                <input type="text" class="form-control" id="genere" name="genere" required>
            </div>
            <button type="submit" class="btn btn-primary">Aggiungi libro</button>
        </form>
    </div>
</body>
</html>