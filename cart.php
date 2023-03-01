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
	<link rel="stylesheet" href="styles/cart/cart.css">
	<link rel="stylesheet" href="styles/style.css">

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
	<h3>Košík</h3>
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
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Odobrať</span></a></td>
					</tr>
				<?php
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
				?>
	
				<tr class="last">
					<td colspan="3"></td>
					<td>Spolu: <?php echo number_format($total, 2); ?>€</td>
					<td><a href="shipping.php"><input type="submit" value="Zaplatit"></a></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>

	<?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>

</html>