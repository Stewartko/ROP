<?php include 'config.php'; 
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
    <link rel="stylesheet" href="styles/product/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
<?php include 'parts/header.php'; ?>

<form action="" method="GET">
    <div class="search">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="searchBar" placeholder="Search data">
        <button type="submit" class="button">Search</button>
    </div>
</form>
<div class="border"></div>

    <div class="productContainer">
        <?php
	        if(isset($_GET['search'])) {
		        $filtervalues = $_GET['search'];
            	$sql = "SELECT * FROM produkt WHERE meno LIKE '%$filtervalues%'";
            	$result = mysqli_query($conn, $sql);
        ?>
        <?php foreach ($result as $data): ?> 
            <?php
                $cena = $data['cena'];
                $meno = $data['meno'];      
            ?>
            <div class="product">
                <img src="<?= $data["img"]?>" alt="fotka">
                <?= "<h6>$meno</h6>"?>
                <?= "<label for='cena'>Cena: $cena €</label>" ?>
            </div>
        <?php endforeach ?> 
	<?php 
	} else {
        $sql = "SELECT * FROM produkt";
        $result = mysqli_query($conn, $sql);
        ?>
        <?php foreach ($result as $data): ?> 
            <?php
                $cena = $data['cena'];
                $meno = $data['meno'];      
            ?>
            <div class="product">
                <img src="<?= $data["img"]?>" alt="fotka">
                <?= "<h6>$meno</h6>"?>
                <?= "<label for='cena'>Cena: $cena €</label>" ?>
            </div>
        <?php endforeach ?> 
	<?php 
    }
	?>
        
 </div>
    <?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>
</html>