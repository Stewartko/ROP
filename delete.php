<?php
include 'config.php'; 
$id = $_GET['id'];
$type = $_GET['type'];

if ($type = 'recenzia') {
    $query = "DELETE FROM recenzie WHERE idRecenzia = $id";
    mysqli_query($conn, $query);
    header('location: recenzie.php');
}

if ($type = 'produkt') {
    $query = "DELETE FROM produkt WHERE idProduct = $id";
    mysqli_query($conn, $query);
    header('location: products.php');
}