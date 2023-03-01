<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, test_input($_POST['id']));
$password = mysqli_real_escape_string($conn, test_input($_POST['password']));
$name = mysqli_real_escape_string($conn, test_input($_POST['name']));
$surname = mysqli_real_escape_string($conn, test_input($_POST['surname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, test_input($_POST['phone']));
$oldPass = mysqli_real_escape_string($conn, test_input($_POST['oldPass']));
$oldPass = password_hash($oldPass, PASSWORD_BCRYPT, $options = []);
$newPass = mysqli_real_escape_string($conn, $_POST['newPass']);
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
        if ($oldPass = $password) {
            $newPass = password_hash($newPass, PASSWORD_BCRYPT, $options = []);
            $result = mysqli_query($conn, "UPDATE zakaznik SET meno='$name',priezvisko='$surname',email='$email',mobil='$phone', heslo='$newPass' WHERE idZakaznika=$id");
            header("Location: profile.php");
        } else {
            echo '<font color="red">Heslá sa nezhodujú.</font><br>';
        }
        
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>