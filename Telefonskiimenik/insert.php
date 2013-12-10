
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="imenik.css" rel="stylesheet" type="text/css" />
<title>Upis kontakata</title>

Popunite ispod navedena polja!

<form id="upis" name="upis" action="" method="post">
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
<?php
if (isset($_POST["unos"])) {
if(isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["broj"])) {
$ime=$_POST["ime"];
$prezime=$_POST["prezime"];
$broj=$_POST["broj"];

include "konekcija.php";
$sql="INSERT INTO korisnici (ime,prezime,br_telefona) VALUES ('".$ime."','".$prezime."','".$broj."')";
if($mysqli->query($sql)) {
echo "<p>Kontakt je uspesno ubacen</p>";


} else {
echo "Nastala je greska pri ubacivanju kontakta" . $mysqli->error;

}



} else {
echo "Nisu prosledjeni parametri";
}
$mysqli->close();
}

?>



</body>
</html>