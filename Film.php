<?php

class Film
{
    public $film_id;
    public $opis;
    public $glavne_uloge;
    public $korisnik_id;


    public function sacuvajIzmene($film_id, $opis, $glavne_uloge, $korisnik_id)
    {
        $conn = new mysqli("localhost", "root", "", "filmovi");
        $upit = "update filmovi set opis='" . $opis . "', glavne_uloge='" . $glavne_uloge . "',
        korisnik_id='" . $korisnik_id . "' where film_id=" . $film_id;

        return $conn->query($upit);
    }

}