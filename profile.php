<?php
    include 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
        $row = mysqli_fetch_assoc($result);
        $result2 = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");
        $row2 = mysqli_fetch_assoc($result2);
    } else {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header/headerS.css">
    <link rel="stylesheet" href="styles/footer/footer.css">
    <link rel="stylesheet" href="styles/profile/profile.css">
    <link rel="stylesheet" href="styles/addAdress/addAdress.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <main>
        <div class="account">
        <h1>Môj profil</h1>
        <div class="underline"></div>
        </div>

        <div class="accInfo">
            <div class="menu">
                <b>Meno</b><br>
                <b>Priezvisko</b><br>
                <b>Email</b><br>
                <b>Tel.číslo</b>            
            </div>
            <div class="data">
                <b><?php echo $row["meno"]; ?></b><br>
                <b><?php echo $row["priezvisko"]; ?></b> <br>
                <b><?php echo $row["email"]; ?></b><br>
                <b><?php echo $row["mobil"]; ?> </b>          
            </div>
        </div>
        <a href="editData.php">
            <button class="change" >Upraviť údaje</button>
        </a>
        <div class="underline"></div>
        <div class="adress">
            <p>Adresa</p>
            <div class="underline"></div>
        </div>
        <?php if(!empty($row2["idAdresa"])){
                include "parts/adress.php";
                echo '<a href="editAdress.php">
                <button class="change" >Upraviť adresu</button>
            </a>';
              }else{
                include "parts/addAdress.php";
              } 
        ?>

        
      
    </main>

    <?php include "parts/footer.php"; ?>
</body>

<script src="javascript/main.js"></script>
</html>