<?php

    $upit = "delete from filmovi where film_id=" . $_GET['film_id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmovi";
    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->query($upit)) {
        header('Location: index.php');
    } else {
        echo 'Greska!';
    }