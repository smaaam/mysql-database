<?php
$palvelin = "localhost";
$kayttaja = "Matti";
$salasana = "Matti1";
$tietokanta = "db";

// luo yhteys
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

// jos yhteyden muodostaminen ei onnistunut, keskeytä
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " .$yhteys->connect_error);
}
else 
echo "Tietokantayhteys luotu."; // tämä näyttää että yhteys on luotu web sivulla (localhost)

// aseta merkistökoodaus (muuten ääkköset sekoavat)
$yhteys->set_charset("utf8");

var_export($_POST);

/*$lisayssql = "INSERT INTO auto (rekisterinro, merkki, vari) VALUES ('FKC-560', 'Audi', 'punainen')";

$tulos = $yhteys->query($lisayssql);

if ($tulos === TRUE) {
   echo "Auto lisätty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}
*/

?>