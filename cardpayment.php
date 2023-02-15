<?php
include 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
    $row = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");
    $row2 = mysqli_fetch_assoc($result2);
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
	<link rel="stylesheet" href="styles/cardpayment/cardpayment.css">

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
	<h3>Platba kartou</h3>
    <div class="border"></div>
<div class="row">
  <div class="col-75">
    <div class="container">

        <div class="row">
          <div class="col-50">
            <h3>Dodacia Adresa</h3>
            <label for="fname"><i class="fa fa-user">Celé meno</i></label>
            <input type="text" id="fname" name="firstname" placeholder="Zadaj meno" value="<?php if(!empty($_SESSION["id"])){echo $row["meno"];} else{} ?>">
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

          <div class="col-50">
            <h3>Platba</h3>
            <label for="fname">Akceptované karty</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Meno na karte</label>
            <input type="text" id="cname" name="cardname" placeholder="Janko Hrasko">
            <label for="ccnum">Číslo karty</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Mesiac</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Rok</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <a href="ordersummary.php"><input type="submit" value="Objednať" class="btn"></a>
      </form>
    </div>
  </div>
</div>

	<?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>

</html>