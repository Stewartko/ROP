<?php
    include("config.php");
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");

    while($res = mysqli_fetch_array($result)) {
        $state = $res["stat"];
        $region = $res["kraj"];
        $city = $res["mesto"];
        $postCode = $res["psc"];
        $street = $res["adresa"];
        $idAdress = $res["idAdresa"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="styles/footer/footer.css">
	<link rel="stylesheet" href="styles/header/headerS.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/edit/edit.css">
	<link rel="stylesheet" href="styles/register/register.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
	<?php include("parts/header.php") ?>

	<section>
            <div class="container">
                <form name="form1" method="post" action="editprocess.php">
                    <div class="head">
                        <p>Úprava adresy</p>

                        <div class="underline"></div>
                    </div>
                    
                    <div class="forms">
                        <label for="state">Štát</label>
                        <input type="text" name="state" value="<?php echo $state;?>">
                    </div>

                    <div class="forms">
                        <label for="region">Región</label>
						<input type="text" name="region" value="<?php echo $region;?>">
                    </div>

					<div class="forms">
                        <label for="city">Mesto</label>
                        <input type="text" name="city" value="<?php echo $city;?>">
                    </div>

                    <div class="forms">
                        <label for="postCode">PSČ</label>
						<input type="text" name="postCode" value="<?php echo $postCode;?>">
                    </div>

					<div class="forms">
                        <label for="street">Ulica</label>
						<input type="text" name="street" value="<?php echo $street;?>">
                    </div>

                    <div class="bt">
						<input type="hidden" name="id" value="<?php echo $idAdress;?>">
						<button type="submit" name="update" value="Update">Uložiť zmeny</button>
                    </div>
                </form>
            </div>
        </section>

	<?php include("parts/footer.php") ?>
</body>
</html>