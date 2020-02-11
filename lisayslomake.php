<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
    <title>Lisäyslomake</title>

	<style>
	label {
		display: inline-block;
		width: 150px;
	}

	input[type="submit"] {
		margin-left: 153px;
		margin-top: 5px;
	}

	span {
		display: inline-block;
		width: 120px;
		border: 1px solid grey;
	}

	ul {
		list-style-type: none;
	}

	a {
		padding: 2px;
	}

	a:hover {
		color: red;
		background-color: pink;
	}
</style>
</head>
<body>
	<div> UUSI REKISTERINUMERO TIETOKANTAAN</div><br>
	<form action="db_palvelin.php" method="post">
		<label>Rekisterinumero</label>
		<input name="rekisterinro" placeholder="Rekisterinumero"><br>
		<label>Merkki</label>
		<input name="merkki" placeholder="Merkki"><br>
		<label>Väri</label>
		<input name="vari" placeholder="Väri"><br>

		<input type="submit" name="button" value='Tallenna'>
	</form>
	<?php
	$palvelin = "localhost";
	$kayttaja = "Matti";
	$salasana = "Matti1";
	$tietokanta = "db";

	$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

	if ($yhteys->connect_error) {
		die("Yhteyden muodostaminen epäonnistui: " .$yhteys->connect_error);
	}

	$query = "SELECT id,rekisterinro,merkki,vari FROM auto ORDER BY rekisterinro LIMIT 25";
	$tulos = $yhteys->query($query);

	if (!$tulos) {
		echo "Virhe: $query<br>".$yhteys->error;
	}
	echo "<ul>";
	while($rivi = $tulos->fetch_assoc()) {
		$id = $rivi['id'];
		$rekisterinro = $rivi["rekisterinro"];
		$merkki = $rivi["merkki"];
		$vari = $rivi["vari"];
		echo "<li><span>$rekisterinro</span><span>$merkki</span><span>$vari</span><a href=\"db_palvelin.php?id=$id&button=poista\">Poista</a><a href=\"db_palvelin.php?id=$id&button=muuta\">Muuta</a></li>";
	}
	echo "</ul>";
	?>
</body>
</html>