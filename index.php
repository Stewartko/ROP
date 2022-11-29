<?php
    include 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
        $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="styles/mainPage/mainP.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
    <?php include 'parts/header.php'; ?>
    <main>
        <div class="cards">
            <div class="card">
                <a href="application.php">
                    <img src="media/screen_protector.jpg" alt="">
                </a>
            </div>
            <div class="card">
                <img src="media/screen_protector.jpg" alt="" id="product">
            </div>
            <div class="card">
                <img src="media/screen_protector.jpg" alt="">
            </div>
        </div>
    </main>


    <?php include "parts/footer.php"; ?>
</body>

<script src="javascript/main.js"></script>
</html>