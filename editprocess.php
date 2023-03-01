<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, test_input($_POST['id']));
$state = mysqli_real_escape_string($conn, test_input($_POST['state']));
$region = mysqli_real_escape_string($conn, test_input($_POST['region']));
$city = mysqli_real_escape_string($conn, test_input($_POST['city']));
$postCode = mysqli_real_escape_string($conn, test_input($_POST['postCode']));
$street = mysqli_real_escape_string($conn, test_input($_POST['street']));	
if(empty($state) || empty($region) || empty($city) || empty($postCode) || empty($street)) {	
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
$result = mysqli_query($conn, "UPDATE adresa SET stat='$state',kraj='$region',mesto='$city',psc='$postCode',adresa='$street' WHERE idAdresa=$id");
header("Location: profile.php");
}
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>