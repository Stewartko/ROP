<?php 
include 'config.php'; 

if(isset($_POST["submit"])){
    $nazov = $_POST["nazov"];
    $cena = $_POST["cena"];
    $popis = $_POST["popis"];
    $pocet = $_POST["pocet"];

    if(!is_dir('media')){
        mkdir('media');
    }

    $imagePath = '';
    $image = $_FILES['fotka'] ?? null;
    if($image && $image['tmp_name']){
        $imagePath = 'media/imgs/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    

    $query = "INSERT INTO produkt VALUES('','$imagePath','$nazov','$cena','$pocet','$popis')";
    mysqli_query($conn, $query);
    echo "<script> alert('Produkt bol pridany'); </script>";
}
function randomString($n){
    $characters = '0123456789abcdefghijklmnoqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for($i = 0; $i < $n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str = $str.$characters[$index];
    }
    return $str;
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

<?php
if(!empty($_SESSION["id"])){
    if($_SESSION["id"] == 1){
?>
    <div class="admin">
    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="input">
            <label for="fotka">Vyber fotku produktu</label>
            <input type="file" name="fotka">
        </div>
        <div class="input">
            <label for="nazov">Nazov produktu</label>
            <input type="text" id="nazov" name="nazov">
        </div>
        <div class="input">
            <label for="popis">Popis produktu</label>
            <input type="text" id="popis" name="popis">
        </div>
        <div class="input">
            <label for="nazov">Cena produktu</label>
            <input type="text" id="cena" name="cena">
        </div>
        <div class="input">
            <label for="pocet">Pocet kusov</label>
            <input type="text" id="pocet" name="pocet">
        </div>
        <input type="submit" name="submit">
    </form>
    </div>
<?php
}
}
?>


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
                $cena = number_format($data['cena'], 2, ",", " ");
                $meno = $data['meno'];
            ?>
           <a href="productdetail.php?id=<?=$data['idProduct']?>">
            <div class="product">
                <img src="media/<?= $data["img"]?>" alt="fotka">
                <?= "<h6>$meno</h6>"?>
                <?= "<label for='cena'>Cena: $cena €</label>" ?>
            </div>
            </a>

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
                $id = $data['idProduct'];
            ?>
            <a href="productdetail.php?id=<?=$data['idProduct']?>">
            <div class="product">
                <img src="<?= $data["img"]?>" alt="fotka">
                <?= "<h6>$meno</h6>"?>
                <?= "<label for='cena'>Cena: $cena €</label>" ?>
                <?php
                if(!empty($_SESSION["id"])){ 
                if($_SESSION["id"] == 1){
                ?>
                <form action='delete.php?id="<?php echo $id; ?>"' method="post">
                    <input type="hidden" name="name" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Odstrániť">
                </form>
                <form action='productdetail.php?id=<?php echo $id; ?>' method="post">
                    <input type="hidden" name="name" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Upraviť">
                </form>
                <?php
                }}?>
            </div>
            </a>
        <?php endforeach ?> 
	<?php 
    }
	?>
        
 </div>
    <?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>
</html>