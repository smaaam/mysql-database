<?php
$palvelin = "localhost";
$kayttaja = "Matti";
$salasana = "Matti1";
$tietokanta = "db";

// luo yhteys
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

// jos yhteyden muodostaminen ei onnistunut, keskeyt�
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen ep�onnistui: " .$yhteys->connect_error);
}
else 
echo "Tietokantayhteys luotu."; // t�m� n�ytt�� ett� yhteys on luotu web sivulla (localhost)

// aseta merkist�koodaus (muuten ��kk�set sekoavat)
$yhteys->set_charset("utf8");

var_export($_POST);

/*$lisayssql = "INSERT INTO auto (rekisterinro, merkki, vari) VALUES ('FKC-560', 'Audi', 'punainen')";

$tulos = $yhteys->query($lisayssql);

if ($tulos === TRUE) {
   echo "Auto lis�tty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}
*/

?>