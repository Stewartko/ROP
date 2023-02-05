<?php
 include 'config.php';
 
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
    $row = mysqli_fetch_assoc($result);
} else {
  $id = null;
}

$sql = "SELECT * FROM `recenzie`";
$resultRecenzie = mysqli_query($conn, $sql);


if(isset($_POST["submit"])){
  $recenzia = $_POST["recenzia"];
  $hviezdicky = $_POST["hviezdicky"];

  $query = "INSERT INTO recenzie ( idZakaznika, recenzia, hviezdicky) VALUES ('$id', '$recenzia', '$hviezdicky')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: ./recenzie.php");
  } else {
    header("Location: ./login.php");
  }

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
    <link rel="stylesheet" href="styles/recenzie/recenzie.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Recenzie</title>
    <link rel="icon" type="image/png" href="media/logo/gprotect-01.svg"/>
</head>

<body>
<?php include 'parts/header.php'; ?>



    <main>
        <div class="container">
            <div class="inner">
              <h1>Recenzie</h1>
              <div class="border"></div>

              <?php
              if (!$id){
                echo "Aby si pridal recenziu sa musis prihlasit";
              } else {
                include './parts/recenziaForm.php';
              }
              ?>

              <div class="row">


              <?php foreach ($resultRecenzie as $data): ?> 

              <div class="col">
                  <div class="review">
                    <img src="/media/screen_protector.jpg" alt="">
                    <?php
                      $customerID = $data['idZakaznika'];
                      $sql = "SELECT meno, priezvisko FROM `zakaznik` WHERE idZakaznika=$customerID";
                      $resultMena = mysqli_query($conn, $sql); 
                      $meno = mysqli_fetch_assoc($resultMena); 
                      
                      $sql = "SELECT * FROM recenzie WHERE idZakaznika=$customerID";
                      $result = mysqli_query($conn, $sql); 
                      $row = mysqli_fetch_assoc($result); 
                    ?>
                    
                    <div class="name"><?= $meno['meno'] . " " . $meno['priezvisko']?></div>

                    <div class="stars">
                      <?php for ($i = 1; $i <= $data['hviezdicky']; $i++): ?> 
                        <i class="fas fa-star"></i>
                      <?php endfor ?>
                    </div>
                    <p>
                      <?= $data['recenzia']?>
                    </p>
                  </div>
                  <?php
                  if (!empty($_SESSION["id"])) {
                      if ($_SESSION["id"] == 1) {
                  ?>
                    <form action='delete.php?id="<?php echo $row["idRecenzia"]; ?>"&type="<?php echo "recenzia"; ?>"' method="post">
                        <input type="hidden" name="name" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Odstrániť">
                    </form>
                  <?php
                      }
                  } ?>
                </div>

              <?php endforeach ?>
              </div>
            </div>
          </div>
    </main>


    <?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>
</html>