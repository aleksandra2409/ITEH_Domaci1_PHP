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
    <form method="post" class="text-center" id="novi_film">


        <div class="mb-3">
            <label class="form-label">Naziv filma: </label>
            <input type="text" class="form-control" name="naziv">
        </div>
        <div class="mb-3">
            <label class="form-label">Opis filma: </label>
            <textarea class="form-control" name="opis" rows="8"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Glavne uloge: </label>
            <input type="text" class="form-control" name="glavne_uloge">
        </div>
        <div class="mb-3">
            <label class="form-label">Žanr filma: </label>
            <input type="text" class="form-control" name="zanr">
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Korisnik: </label>
            <select class="form-select" name="korisnik">
                <?php
                $query = "select korisnik_id,korisnicko_ime from korisnik";
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $db = "filmovi";
                $connection = new mysqli($hostname, $username, $password, $db);
                $result = $connection->query($query);

                while ($korisnik = mysqli_fetch_array($result)) :
                ?>
                    <option class="text-center" value="<?php echo $korisnik['korisnik_id']; ?>"><?php echo $korisnik['korisnicko_ime']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="btn_sacuvaj_film" class="btn btn-primary">Sačuvaj novi film</button>
    </form>

    <?php
    require 'Film.php';

    if (isset($_POST['btn_sacuvaj_film'])) {

        $film = new Film();
        if ($film->sacuvajNoviFilm($_POST['naziv'], $_POST['opis'], $_POST['glavne_uloge'], $_POST['zanr'], $_POST['korisnik'])) {
            header('Location: index.php');
        } else {
            echo 'Greska!';
        }
    }

    ?>

</body>

</html>