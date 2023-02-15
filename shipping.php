<?php
include 'config.php';

if (isset($_POST["add_to_cart"])) {
	if (isset($_SESSION["shopping_cart"])) {

		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if (!in_array($_GET["id"], $item_array_id)) {
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		} else {
			echo '<script>alert("Item Already Added")</script>';
		}
	} else {
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
	header("Location: products.php");
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["item_id"] == $_GET["id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
				$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
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
	<link rel="stylesheet" href="styles/shipping/shipping.css">

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
	<h3>Doprava</h3>
	<div class="cart">
		<table class="table">
			<tr>
				<th>Vyberte spôsob dopravy</th>
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
				<th>Vyberte spôsob platby</th>
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
	
				<tr>
					<td class="last" colspan="3"></td>
					<td class="last">Spolu: <?php echo number_format($total, 2); ?>€</td>
					<td class="last"><a href ="cardpayment.php"><input type="submit" value="Dodacie údaje"></a></td>
					<td class="last"><a href =""><input type="submit" value="Dodacie údaje"></a></td>
				</tr>
		</table>
	</div>

	<?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>

</html>