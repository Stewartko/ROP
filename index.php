<?php
include 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");
    $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="styles/mainPage/mainP.css">
    <link rel="stylesheet" href="styles/loading/loading.css">
    <script src="jquery-2.1.4.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>GProtect</title>
    <link rel="icon" type="image/png" href="media/logo/gprotect-01.svg" />
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <main>
        <div class="ads">
            <div class="ad">
                <img src="media/ad1.png" id="image">
            </div>
        </div>

        <section class="section">
            <div class="paragraph">
                <h2>Hľadáte sklo za najlepšiu cenu na trhu?</h2>
                <h3>My vám pomôžeme!</h3>
                <div class="products">
                    <?php
                    $sql = "SELECT * FROM produkt LIMIT 7";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $data){
                        $cena = $data['cena'];
                        $meno = $data['meno'];
                        $id = $data['idProduct'];
                    ?>
                    <a href="productdetail.php?id=<?= $data['idProduct'] ?>">
                        <div class="product">
                            <img src="<?= $data["img"] ?>" alt="fotka">
                            <?= "<h6>$meno</h6>" ?>
                            <?= "<label for='cena'>Cena: $cena €</label>" ?>
                        </div>
                    </a>
                <?php } ?>
                </div>
                <a class="btn fa fa-arrow-right" href="products.php">Nakupuj tu</a>
            </div>

            <div class="paragraph">
                <h2>Neviete nalepiť sklo sami?</h2>
                <h3>My vám pomôžeme!</h3>
                <p>Ak používate obal na telefón odporúčame ho dať dole. Ako prvé zoberieme suchú jemnú utierku a z ľahkapretrieme sklo na mobile. Mobli nakloníme do svetla a skontrolujeme, či sme sklo utreli poriadne.Zoberieme si jemnú utierku, ktorú zvlhčíme vodou, môžte použiť aj lieh pre dezinfekciu. Začnemečistiť sklo na mobile, najlepšie ak by ste nemenili smer čistenia(z hora do dola alebo naopak). Ak máme vyčistené celé sklo zoberieme suchú utierku a ešte raz pretrieme sklo, aj tu odporúčame tenistý pohyb čistenia.</p>
                <a class="btn fa fa-arrow-right" href="application.php">Čítaj ďalej</a>
            </div>

            <div class="paragraph">
                <h2>Bojíte sa, že Vám tovar nepríde?</h2>
                <h3>My vám pomôžeme!</h3>
                <div class="rews">
                    <?php
                    $sql = "SELECT * FROM recenzie LIMIT 7";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $data){
    
                    ?>
                    <div class="review">
                        <?php
                        $customerID = $data['idZakaznika'];
                        $sql = "SELECT meno, priezvisko FROM `zakaznik` WHERE idZakaznika=$customerID";
                        $resultMena = mysqli_query($conn, $sql);
                        $meno = mysqli_fetch_assoc($resultMena);
                        ?>
                        <div class="name"><?= $meno['meno'] . " " . $meno['priezvisko'] ?></div>

                        <div class="stars">
                        <?php for ($i = 1; $i <= $data['hviezdicky']; $i++) : ?>
                            <i class="fas fa-star"></i>
                        <?php endfor ?>
                        </div>
                        <span class="text">
                        <?= $data['recenzia'] ?>
                        </span>
                    </div>
                <?php } ?>
                </div>
                <a class="btn fa fa-arrow-right" href="recenzie.php">Napíš recenziu</a>
            </div>
        </section>
    </main>

    <?php include "parts/footer.php"; ?>
</body>

<script src="javascript/main.js"></script>
<script src="javascript/ads.js"></script>

</html>