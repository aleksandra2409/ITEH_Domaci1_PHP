<?php

$column_id = $_POST['column_id'];
$sort = $_POST['sort'];

?>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th id="film_id" value="<?php
                                if ($sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                }
                                ?>">Film ID</th>
            <th id="naziv" value="<?php
                                    if ($sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                    ?>">Naziv</th>
            <th id="opis" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Opis</th>
            <th id="glavne_uloge" value="<?php
                                    if ($sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                    ?>">Glavne uloge</th>
            <th id="zanr" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Žanr</th>
            <th id="korisnicko_ime" value="<?php
                                        if ($sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        }
                                        ?>">Korisnik</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select f.film_id, f.naziv, f.opis, f.glavne_uloge, f.zanr, k.korisnicko_ime from filmovi f join korisnik k on f.korisnik_id=k.korisnik_id order by " . $column_id . " " . $sort . "";
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "filmovi";
        $conn = new mysqli($hostname, $username, $password, $dbname);

        $result = $conn->query($query);

        while ($red = mysqli_fetch_array($result)) :
        ?>
            <tr class="text-center">
                <td><?php echo $red['film_id']; ?></td>
                <td><?php echo $red['naziv'];  ?></td>
                <td><?php echo $red['opis'];  ?></td>
                <td><?php echo $red['glavne_uloge'];  ?></td>
                <td><?php echo $red['zanr']; ?></td>
                <td><?php echo $red['korisnicko_ime']; ?></td>
            </tr>

        <?php endwhile; ?>

    </tbody>

</table>