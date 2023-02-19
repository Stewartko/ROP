<?php
include 'config.php';


if (isset($_POST["submit"])) {
	// $kosik = ;
	// $doprava = ;
	// $platba = ;
	// $idZakaznika = ;
	// $query = "INSERT INTO objednavky VALUES('','$kosik','$doprava','$platba','$idZakaznika')";
    // mysqli_query($conn, $query);
	require 'generateEmail.php';
	$email = $_POST["email"];
	$num = "Číslo objednávky: ";
	$shippingTo = "Meno: " . $_POST["name"] . "<br>" . "Adresa: " . $_POST["address"] . ", " . $_POST["city"] . " " . $_POST["zip"] . ", " . $_POST["state"];
	sendRef($email, $num, $shippingTo);
	$_SESSION["shopping_cart"] = [];
	header("Location: products.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/header/headerS.css">
	<link rel="stylesheet" href="styles/footer/footer.css">
	<link rel="stylesheet" href="styles/ordersummary/ordersummary.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Nákupný košík</title>
	<link rel="icon" type="image/png" href="media/logo/gprotect-01.svg"/>
</head>

<body>
	<?php include "parts/header.php"; ?>
	<h3>Súhrn objednávky</h3>
    <div class="border"></div>
	<div class="cart">
		<table class="table">
			<tr>
				<th>Názov produktu</th>
				<th>Počet</th>
				<th>Cena(bez DPH)</th>
				<th>Cena</th>
				<th></th>
			</tr>
			<?php
			if (!empty($_SESSION["shopping_cart"])) {
				$total = 0;
				foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
						
					</tr>
				<?php
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
				?>
			<?php
			}
			?>
		</table>
	</div>
    <div class="cart">
		<table class="table">
			<tr>
				<th>Vybratý spôsob dopravy</th>
				<th></th>
				<th></th>
				<th>Cena</th>
				<th></th>
			</tr>
			<?php
			if (!empty($_SESSION["shopping_cart"])) {
				$total = 0;
				foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
				$total = $total + 3;
			}
			?>
					<tr>
						<td class = "options"><div class="radiocheck">
								<input type="radio"  name="doprava" class="radio" value="gls" checked>
								<input type="image" class="optionpick" alt="Login" src="/media/gls.png" width=30px height=22px>
								<label for="gls">GLS Express</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>3€</td>
					</tr>
					<tr>
						<td class = "options"><div class="radiocheck">
								<input type="radio"  name="doprava" class="radio" value="packeta">
								<input type="image" class="optionpick" alt="Login" src="/media/packeta.png" width=30px height=22px>
								<label for="packeta">Zásielkovňa - Doručenie na odberné miesto</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>3€</td>
					</tr>
					<tr>
						<td class = "options"><div class="radiocheck">
								<input type="radio" name="doprava" class="radio" value="dpd">
								<input type="image" class="optionpick" alt="Login" src="/media/dpd.png" width=30px height=22px>
								<label for="packeta">Dovoz kuriérom DPD</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>3€</td>
					</tr>
					<tr>	
						<td class = "options"><div class="radiocheck">
								<input type="radio" name="doprava"class="radio" value="ups">
								<input type="image" class="optionpick" alt="Login" src="/media/ups.jpg" width=30px height=22px>
								<label for="packeta">UPS – kuriérska služba</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>3€</td>
					</tr>
		</table>
		<table class="table">
			<tr>
				<th>Vybratý spôsob platby</th>
				<th></th>
				<th></th>
				<th>Cena</th>
				<th></th>
			</tr>
			<?php
			if (!empty($_SESSION["shopping_cart"])) {
				$total = 0;
				foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
				$total = $total + 3;
			}
			?>
					<tr>
						<td class = "options"><div class="radiocheck">
								<input type="radio"  name="platba" class="radio" value="gls" checked>
								<input type="image" class="optionpick" alt="Login" src="/media/karta.svg" width=30px height=22px>
								<label for="gls">Platba kartou</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>Zadarmo</td>
					</tr>
					<tr>
						<td class = "options"><div class="radiocheck">
								<input type="radio"  name="platba" class="radio" value="packeta">
								<input type="image" class="optionpick" alt="Login" src="/media/dobierka.svg" width=30px height=22px>
								<label for="packeta">Dobierka</label>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>1€</td>
					</tr>
	
			
		</table>
	</div>
    <div class="row">
  <div class="col-75">
    <div class="container">

        <div class="row">
          <div class="col-50">
            <h3>Dodacia Adresa</h3>
			<form action="" method="post">
            <label for="fname"><i class="fa fa-user">Celé meno</i></label>
            <input type="text" id="fname" name="name" placeholder="Zadaj meno" value="<?php if(!empty($_SESSION["id"])){echo $row["meno"];} else{} ?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Zadaj email" value="<?php if(!empty($_SESSION["id"])){echo $row["email"];} else{} ?>">
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresa</label>
            <input type="text" id="adr" name="address" placeholder="Zadaj adresu" value="<?php if(!empty($_SESSION["id"])){echo $row2["adresa"];} else{} ?>">
            <label for="city"><i class="fa fa-institution"></i> Mesto</label>
            <input type="text" id="city" name="city" placeholder="Zadaj mesto" value="<?php if(!empty($_SESSION["id"])){echo $row2["mesto"];} else{} ?>">

            <div class="row">
              <div class="col-50">
                <label for="state">Štát</label>
                <input type="text" id="state" name="state" placeholder="Zadaj štát" value="<?php if(!empty($_SESSION["id"])){echo $row2["stat"];} else{} ?>">
              </div>
              <div class="col-50">
                <label for="zip">PSČ</label>
                <input type="text" id="zip" name="zip" placeholder="Zadaj psč" value="<?php if(!empty($_SESSION["id"])){echo $row2["psc"];} else{} ?>">
              </div>
            </div>
          </div>

          
          </div>

        </div>
    </div>
    <input type="submit" name="submit" value="Odoslať objednávku" class="btn">
	</form>
  </div>
  
</div>

	<?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>

</html>