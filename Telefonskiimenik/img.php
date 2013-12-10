<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div>
<div class="centar">
<form action="img.php" method="POST" enctype="multipart/form-data">
<table>
<tr>
<td>File:</td>
<td><input type="file" name="image"></td></tr>
<tr>
<td><p><label>Id korisinika: </td> <td><input type="text" id="idupisan" name="idupisan" value="" /></label></p></td></tr> 
</table>
 <input type="submit" value="Upload">

</form>

<?php
include "konekcija.php";



$file=$_FILES['image']['tmp_name'];
$idupisan=$_REQUEST['idupisan'];
if (!isset($file)) {
	echo "Molimo Vas da izaberite sliku!";
 	}else {
	$image= file_get_contents ($_FILES['image']['tmp_name']);
	$image_name=$_FILES['image']['name'];
	$image_size=getimagesize($_FILES['image']['tmp_name']);	
	if ($image_size==FALSE) {	
		echo "Ovo nije slika";
		}else
		{   
			$sql="INSERT INTO korisnici (image,name) VALUES ('".$image."','".$image_name." ') WHERE id='$idupisan'";
			if($mysqli->query($sql))
			echo "Problem u obradi.";
			
		else
			 {
				 
				 
				 
				 
			$lastid=mysql_insert_id();
			echo "Slika je obradjena.<p />Vasa slika: <p/><img src=get.php?id=$idupisan>";	
				}}}?> 
				</br></br></br></br></br></br></br></br></br>
				<div class="link">
                <a href="frame.html">Povratak na glavnu stranu </a>
				</div>
				</div>
 </div>               
</body>
</html>
