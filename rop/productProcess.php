<?php
 if(isset($_POST['update']))
 {	
 
 $id = mysqli_real_escape_string($conn, $_POST['id']);
 $fotka = mysqli_real_escape_string($conn, $_POST['fotka']);
 $nazov = mysqli_real_escape_string($conn, $_POST['nazov']);
 $popis = mysqli_real_escape_string($conn, $_POST['popis']);
 $cena = mysqli_real_escape_string($conn, $_POST['cena']);
 $pocet = mysqli_real_escape_string($conn, $_POST['pocet']);
 if(empty($fotka) || empty($nazov) || empty($cena) || empty($popis) || empty($pocet)) {	
 if(empty($fotka)) {
 echo '<font color="red">Photo field is empty.</font><br>';
 }
 if(empty($nazov)) {
 echo '<font color="red">Name field is empty.</font><br>';
 }
 if(empty($cena)) {
 echo '<font color="red">Price field is empty.</font><br>';
 }		
 if(empty($popis)) {
 echo '<font color="red">About code field is empty.</font><br>';
 }
 if(empty($pocet)) {
 echo '<font color="red">Count field is empty.</font><br>';
 }	
 } else {	
 $result = mysqli_query($conn, "UPDATE produkt SET img='$fotka',meno='$nazov',cena='$cena',pocet='$pocet',popis='$popis' WHERE idProduct=$id");
 header("Location: productdetail.php");
 }
 }