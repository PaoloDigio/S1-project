<?php
    $hostname = 'localhost';
    $username = 'root'; 
    $password = ''; 
    $database = 'gestione_libreria';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn === false) {
        die("Errore di connessione al database: " . mysqli_connect_error());
    }