<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
if(empty($name) || empty($surname) || empty($email) || empty($phone)) {	
if(empty($state)) {
echo '<font color="red">State field is empty.</font><br>';
}
if(empty($region)) {
echo '<font color="red">Region field is empty.</font><br>';
}
if(empty($city)) {
echo '<font color="red">City field is empty.</font><br>';
}		
if(empty($postCode)) {
echo '<font color="red">Post code field is empty.</font><br>';
}
if(empty($street)) {
echo '<font color="red">Street field is empty.</font><br>';
}	
} else {	
$result = mysqli_query($conn, "UPDATE zakaznik SET meno='$name',priezvisko='$surname',email='$email',mobil='$phone' WHERE idZakaznika=$id");
header("Location: profile.php");
}
}
?>