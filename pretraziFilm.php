<?php


$vrednost = $_POST['vrednost'];


$query = "select f.film_id, f.naziv, f.opis, f.glavne_uloge, f.zanr, k.korisnicko_ime from filmovi f join korisnik k on f.korisnik_id=k.korisnik_id 
        where f.film_id like '%" . $vrednost . "%' or f.naziv like '%" . $vrednost . "%' or f.opis like '%" . $vrednost . "%' or f.glavne_uloge like '%" . $vrednost . "%' or f.zanr like '%" . $vrednost . "%' or k.korisnicko_ime like '%" . $vrednost . "%'";
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "filmovi";
$connection = new mysqli($hostname, $username, $password, $dbname);

$result = $connection->query($query);

while ($film = mysqli_fetch_array($result)) {
?>

    <tr class="text-center">
        <td><?php echo $film['film_id']; ?></td>
        <td><?php echo $film['naziv'];  ?></td>
        <td><?php echo $film['opis'];  ?></td>
        <td><?php echo $film['glavne_uloge'];  ?></td>
        <td><?php echo $film['zanr']; ?></td>
        <td><?php echo $film['korisnicko_ime']; ?></td>
    </tr>

<?php
}
?>