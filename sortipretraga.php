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

    <div class="container">

        <h2 class="text-center" style="margin-top:15px;">Pretraži i sortiraj filmove</h2>
        <input type="text" id="pretrazi-polje" placeholder="Unesi vrednost za pretragu...">
        <div id="tabela-sort">
        </div>

        <table class="table table-bordered" id="tabela" style="margin-top: 40px;">
            <thead>
                <tr class="text-center">
                    <th id="film_id" value="asc">ID filma</th>
                    <th id="naziv" value="asc">Naziv</th>
                    <th id="opis" value="asc">Opis</th>
                    <th id="glavne_uloge" value="asc">Glavne uloge</th>
                    <th id="zanr" value="asc">Žanr</th>
                    <th id="korisnicko_ime" value="asc">Korisnik</th>
                </tr>
            </thead>

            <tbody id="body-table">
                <?php

                $query = "select f.film_id, f.naziv, f.opis, f.glavne_uloge, f.zanr, k.korisnicko_ime from filmovi f join korisnik k on f.korisnik_id=k.korisnik_id";
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "filmovi";
                $conn = new mysqli($hostname, $username, $password, $dbname);
                $result = $conn->query($query);

                while ($film = mysqli_fetch_array($result)) :
                ?>
                    <tr class="text-center">
                        <td><?php echo $film['film_id']; ?></td>
                        <td><?php echo $film['naziv'];  ?></td>
                        <td><?php echo $film['opis'];  ?></td>
                        <td><?php echo $film['glavne_uloge'];  ?></td>
                        <td><?php echo $film['zanr']; ?></td>
                        <td><?php echo $film['korisnicko_ime']; ?></td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>