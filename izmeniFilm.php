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
    $query = "select * from filmovi where film_id=" . $_GET['film_id'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmovi";
    $connection = new mysqli($hostname, $username, $password, $dbname);

    $result = $connection->query($query);
    $film = mysqli_fetch_object($result);
    ?>

    <form method="post" class="text-center" id="izmeni_forma">

        <input type="hidden" class="form-control" name="hidden-izmena-id" value="<?php echo $film->film_id; ?>">

        <div class="mb-3">
            <label class="form-label">Opis: </label>
            <textarea class="form-control" name="opis" rows="8"><?php echo $film->opis; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Dodaj uloge u filmu: </label>
            <input type="text" class="form-control" name="dodaj_uloge" value="<?php echo $film->glavne_uloge; ?>">
        </div>
        

        <input type="hidden" class="form-control" name="hidden-izmena-korisnik" value="<?php echo $film->korisnik_id; ?>">

        <button type="submit" name="btn_sacuvaj_izmene" class="btn btn-primary">Sačuvaj izmene</button>
    </form>

    <?php
    include 'Film.php';

    if (isset($_POST['btn_sacuvaj_izmene'])) {

        $film = new Film();
        if ($film->sacuvajIzmene($_POST['hidden-izmena-id'], $_POST['opis'], $_POST['dodaj_ulogu'], $_POST['hidden-izmena-korisnik'])) {
            header('Location: index.php');
        } else {
            echo 'Greska!';
        }
    }

    ?>

</body>

</html>