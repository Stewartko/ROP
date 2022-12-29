<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header/headerS.css">
    <link rel="stylesheet" href="styles/footer/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>


    <?php 
        $pruducts = mysqli_query($conn, "SELECT * FROM produkt");
        for($i = 1; $i < 10; $i++){
            $product = mysqli_query($conn, "SELECT * FROM produkt WHERE idProduct = $i");
            $row = mysqli_fetch_assoc($product);

            echo '<img src="media/screen_protector.jpg" alt="">';
            echo $row["meno"];
            echo $row["cena"];
        }
    ?>


</body>
</html>