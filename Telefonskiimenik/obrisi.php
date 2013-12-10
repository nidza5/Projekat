<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="imenik.css" rel="stylesheet" type="text/css" />
<title>Prikaz</title>
</head>

<body>
<?php
include "konekcija.php";
if (isset($_GET["akcija"])){
switch ($_GET["akcija"]){
case "brisanje":
if (isset ($_GET["id"])){
$id = $_GET["id"];
$sql = "DELETE FROM korisnici WHERE id = '$id'";
if (!$mysqli->query($sql)){
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
}
}
?>
<?php
$sql="SELECT ime,prezime,br_telefona FROM korisnici  ";
if (!$q=$mysqli->query($sql)) {

echo "<p> Nstala je greska pri izvodjenju upita</p>" . mysql_query();
exit();

}
if ($q->num_rows==0) {
echo "Nema kontakta";


} else {
?>	
<table>
<tr>
<td><b>Ime</b></td>
<td><b>Prezime</b></td>
<td><b>Broj Telefona</b></td>
<td></td>
</tr>
<?php
while($red=$q->fetch_object()) {
?>
<tr>
<td><?php echo $red->ime; ?>    </td>
<td><?php echo $red->prezime; ?>    </td>
<td><?php echo $red->br_telefona; ?>    </td>
<td><a href="?akcija=brisanje&id=<?php echo $red->id; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>


</body>
</html>