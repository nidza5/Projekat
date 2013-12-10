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
$sql="SELECT ime,prezime,br_telefona FROM korisnici  ORDER BY id DESC";
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
</tr>
<?php
while($red=$q->fetch_object()) {
?>
<tr>
<td><?php echo $red->ime; ?>    </td>
<td><?php echo $red->prezime; ?>    </td>
<td><?php echo $red->br_telefona; ?>    </td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
</br></br></br></br></br></br></br></br>
<a href="frame.html">Povratak na glavnu stranu </a>

</body>
</html>