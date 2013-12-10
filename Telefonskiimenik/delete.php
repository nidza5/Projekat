<!DOCTYPE html>
<html>
<head>
<title>Rad sa bazom podataka</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
//Povezivanje sa bazom podataka
include "konekcija.php";
?>
<?php
if (isset($_GET["akcija"])){
switch ($_GET["akcija"]){
case "unos":
if (isset($_POST["unos"])){
//Prikupljanje podataka sa forme

if (isset($_POST['ime'])&&isset($_POST['prezime'])&&isset($_POST['broj'])){
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$broj = $_POST['broj'];


//Ubacivanje
$sql="INSERT INTO korisnici (ime, prezime, br_telefona) VALUES ('".$ime."','".$prezime."','".$broj."')";
if ($mysqli->query($sql)){
echo "<p>Kontakt je uspešno ubačen!</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju kontakta!</p>" . $mysqli->error;
}
} else {
//Ako POST parametri nisu prosledeni
echo "<p>Nisu prosleđeni parametri!</p>";
}
}
break;
case "brisanje":
if (isset ($_GET["id"])){
$id = $_GET["id"];
$sql = "DELETE FROM korisnici WHERE id = ".$id;
if (!$q=$mysqli->query($sql)){
echo "<p>Nastala je greška pri izvođenju upita</p>" . mysql_query();
die();
} else {
if ($mysqli->affected_rows > 0) {
echo "<p>Brisanje kontakta je uspešno!</p>";
} else {
echo "<p>Brisanje kontakta nije bilo uspešno!</p>";
}
}

} else {
echo "<p>Nije prosleđen parametar ID!</p>";
}
break;
default:
echo "<p>Nepostojeća akcija!</p>";
break;
}
}
?>
<?php
//Prikaz
$sql="SELECT * FROM korisnici ORDER BY id DESC";
if (!$q=$mysqli->query($sql)){
echo "<p>Nastala je greška pri izvođenju upita</p>" . mysql_query();
exit();
}
if ($q->num_rows==0){
echo "<p>Nema kontakta!</p>";
} else {
?>
<table>
<tr>
<td><b>Ime</b></td>
<td><b>Prezime</b></td>
<td><b>Broj_telefona</b></td>

<td></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->ime; ?></td>
<td><?php echo $red->prezime; ?></td>
<td><?php echo $red->br_telefona; ?></td>
<td><a href="?akcija=brisanje&id=<?php echo $red->id; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>


Popunite ispod navedena polja!

<form id="upis" name="upis" action="?akcija=unos" method="post">
<table>
<tr>
<td><p><label>Ime:</td> <td><input type="text" id="ime" name="ime" value="" /></label></p></td> </tr>
<tr>
<td><p><label>Prezime:</td> <td> <input type="text" id="prezime" name="prezime" value="" /></label></p></td> </tr>
<tr>
<td><p><label>Broj telefona:</td> <td> <input type="text" id="broj" name="broj" value="" /></label></p></td> </tr>

</table>


<p><input type="submit" id="submit" name="unos" value="Dodaj" /> <input type="reset" id="reset" name="reset" value="Reset" /></p>

</form>
<div class="povratak"><a href="frame.html">Povratak na glavnu stranu </a> </div>
<?php
$mysqli->close();
?>
</body>
</html>
