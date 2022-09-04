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

    <h1 class="text-center mt-3">Srpska kinematografija</h1>
    <div class="dugmici">
        <div id="novi">
            <a href="noviFilm.php"><button class="btn btn-primary" id="novi-film">Dodaj novi film</button></a>
        </div>
        <div id="sort">
            <a href="sortipretraga.php"><button class="btn btn-primary" id="sort-pretraga">Sortiraj i pretraži film</button></a>
        </div>

    </div>

    <div class="row row-cols-3 row-cols-md-3 g-3">

        <?php
        $query = "select f.film_id, f.naziv, f.opis, f.glavne_uloge, f.zanr, k.korisnicko_ime from filmovi f join korisnik k on f.korisnik_id=k.korisnik_id";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "filmovi";
        $connection = new mysqli($hostname, $username, $password, $dbname) or die("Connect failed: %s\n" . $connection->error);
        $result = $connection->query($query);

        while ($filmovi = mysqli_fetch_array($result)) :
        ?>
            <div class="col">
                <div class="card h-100">
                    <img src="https://www.cudo.rs/wp-content/uploads/2021/07/film-kamera-filmska-traka-bioskop.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title text-center mt-1 mb-3"><?php echo $filmovi['naziv']; ?></h2>
                        <p class="card-text"><?php echo $filmovi['opis']; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="jedanFilm.php?film_id=<?php echo $filmovi['film_id']; ?>"><button class="btn btn-primary">Otvori</button></a>
                        <a href="obrisiFilm.php?film_id=<?php echo $filmovi['film_id']; ?>"><button type="button" class="btn btn-danger" name="btn_obrisi_film" value="<?php echo $filmovi['film_id']; ?>">Obriši</button></a>

                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">Dodao:</small> <?php echo $filmovi['korisnicko_ime']; ?></p>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>