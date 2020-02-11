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

//var_export($_POST);

if(!isset($_REQUEST['button'])){
	echo "Pääsy kielletty.";
} //? error here
if($_REQUEST['button'] == 'Tallenna'){
	$rekisterinro = strtoupper($_POST['rekisterinro']);
	$merkki = $_POST['merkki'];
	$vari = $_POST['vari'];

	$lisayssql = "INSERT INTO auto (rekisterinro, merkki, vari) VALUES ('$rekisterinro', '$merkki', '$vari')";
	$tulos = $yhteys->query($lisayssql);
if ($tulos === TRUE) {
   echo "Auto lisätty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $yhteys->error;
}
}
elseif ($_REQUEST['button'] == 'poista'){
	$id = $_GET['id'];
	$query = "DELETE FROM auto WHERE id = '$id'";
	$tulos = $yhteys->query($lisayssql);
if ($tulos === TRUE) {
   echo "Auto poistettu.";
} else {
   echo "Virhe: " . $query . "<br>" . $yhteys->error;
}
?>

<form method="post" action="lisayslomake.php">
<input type="submit" value="Takaisin">
</form>