<?php
include 'config.php'; 
$id = $_GET['id'];
$query = "DELETE FROM produkt WHERE idProduct = $id";
mysqli_query($conn, $query);
header('location: products.php');