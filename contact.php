<?php
    include 'config.php';
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
    <link rel="stylesheet" href="styles/contact/contact.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Document</title>
</head>
<body>
    <?php include 'parts/header.php'; ?>
    
    <main>
        <h1>Kontakt</h1>

        <div class="refund">
            <h2>Reklamácie</h2>
            <form action="">
                <div class="inputs">
                    <div class="top">
                        <label for="">Email:</label><br>
                        <input type="text">
                        <br>
                        <label for="">Číslo objednávky:</label><br>
                        <input type="num">
                    </div>
                    
                    <div class="bot">
                        <label for="">Dôvod reklamácie:</label><br>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <button>Reklamovať</button>

            </form>
        </div>

        <div class="company">
            <h2>GProtect</h2>
        </div>

        <div class="data">
            <div class="singleData">
                <h3>Adresa spoločnosti</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
            <div class="singleData">
                <h3>Kontaktné údaje</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
            <div class="singleData">
                <h3>Fakturačné údaje</h3>
                <br>
                <a href="" class="fa fa-map-marker">Tehelná 7, Gelnica 056 01 <br> Slovenská republika <br> GPS:</a>
            </div>
        </div>

    </main>

    <?php include 'parts/footer.php'; ?>
</body>
</html>