<?php
include 'config.php'; 
$id = $_GET['id'];
$query = "DELETE FROM recenzie WHERE idRecenzia = $id";
mysqli_query($conn, $query);
header('location: recenzie.php');