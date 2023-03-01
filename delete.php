<?php
include 'config.php';
$id = $_POST['id'];
$type = $_POST['type'];


switch ($type) {
    case 'recenzia':
        $query = "DELETE FROM recenzie WHERE idRecenzia = $id";
        mysqli_query($conn, $query);
        header("Location: recenzie.php");
        break;
    case 'produkt':
        $query = "DELETE FROM produkt WHERE idProduct = $id";
        mysqli_query($conn, $query);
        header('location: products.php');
        break;
}
