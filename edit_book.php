<?php
include __DIR__ . '/includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM libri WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $titolo = $row['titolo'];
        $autore = $row['autore'];
        $anno = $row['anno_pubblicazione'];
        $genere = $row['genere'];
    } else {
        echo "Nessun libro trovato.";
        exit;
    }
} else {
    echo "Errore";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuovo_titolo = $_POST['titolo'];
    $nuovo_autore = $_POST['autore'];
    $nuovo_anno = $_POST['anno'];
    $nuovo_genere = $_POST['genere'];

    $sql = "UPDATE libri SET titolo = '$nuovo_titolo', autore = '$nuovo_autore', anno_pubblicazione = $nuovo_anno, genere = '$nuovo_genere' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Errore nel salvataggio dei dettagli: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modifica libro</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" value="<?php echo $titolo; ?>" required>
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" class="form-control" id="autore" name="autore" value="<?php echo $autore; ?>" required>
            </div>
            <div class="mb-3">
                <label for="anno" class="form-label">Anno di pubblicazione</label>
                <input type="number" class="form-control" id="anno" name="anno" value="<?php echo $anno; ?>" required>
            </div>
            <div class="mb-3">
                <label for="genere" class="form-label">Genere</label>
                <input type="text" class="form-control" id="genere" name="genere" value="<?php echo $genere; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
</body>
</html>