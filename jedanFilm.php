<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>

    <?php

    $query = "select f.film_id, f.naziv, f.opis, f.glavne_uloge, f.zanr, k.korisnicko_ime from filmovi f join korisnik k on f.korisnik_id=k.korisnik_id where f.film_id=" . $_GET['film_id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmovi";
    $connection = new mysqli($hostname, $username, $password, $dbname) or die("Connect failed: %s\n" . $connection->error);
    $result = $connection->query($query);

    $film = mysqli_fetch_object($result);

    ?>

    <div class="container">

        <h1 class="text-center" id="naslov-film" style="margin-top: 20px; margin-bottom: 15px;"><?php echo $film->naziv; ?></h1>
        <br></br>
        <div class="text">
            <?php echo $film->opis; ?>
        </div>
        <br></br>    
        <div class="text">
            <?php echo "Glavne uloge: " .$film->glavne_uloge; ?>
        </div>
        <br></br>
        <div class="text">
            <?php echo "Žanr filma: ".$film->zanr; ?>
        </div>

        <a href="izmeniFilm.php?film_id=<?php echo $film->film_id; ?>"><button type="button" class="btn btn-primary" id="button_izmeni_film">Izmeni</button></a>


    </div>
</body>

</html>