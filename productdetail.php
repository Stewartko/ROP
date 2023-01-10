<?php
    include("config.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/productdetail/productdetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/header/headerS.css">
    <link rel="stylesheet" href="styles/footer/footer.css"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <?php include 'parts/header.php'; ?>
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "media/process.jpg" alt = "sklo">
              <img src = "media/screen_protector.jpg" alt = "sklo">
              <img src = "media/process.jpg" alt = "sklo">
              <img src = "media/screen_protector.jpg" alt = "sklo">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "media/process.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "media/screen_protector.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "media/process.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "media/screen_protector.jpg" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <?php
             if(isset($_GET['id'])) {
              $id = mysqli_real_escape_string($conn, $_GET['id']);
              $query = "SELECT * FROM produkt WHERE idProduct=$id";
              $result = mysqli_query($conn, $query);
              $data = mysqli_fetch_assoc($result);

              $count = $data['pocet'];
            }
            ?>
          <h2 class = "product-title"><?php echo $data['meno']?></h2>
          <div class = "product-price">
            <p class = "new-price">Cena: <span><?php echo $data['cena'];?>€</span></p>
          </div>
          
        <form method="post" action="cart.php?id=<?= $data["idProduct"]; ?>">
						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $data["meno"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $data["cena"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
				</form>

          <div class = "product-detail">
            <h2>O tomnto produkte: </h2>
            <p><?php echo $data['popis'];?></p>
          </div>

          <div class = "social-links">
            <p>Zdielajte na: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php include "parts/footer.php"; ?>
  </body>
  <script src="javascript/script.js"></script>
  <script src="javascript/main.js"></script>
</html>