<?php
    include 'config.php';
    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $emailorphone = $_POST["emailorphone"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE mobil = '$emailorphone' OR email = '$emailorphone'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row['heslo']){
                $_SESSION["login"] = true;
                $_LOGIN = true;
                $_SESSION["id"] = $row["idZakaznika"];
                header("Location: index.php");
            }
            else{
            echo "<script> alert('Zlé heslo'); </script>";
            }
        }
        else{
            echo "<script> alert('Účet neexistuje'); </script>";
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
    <link rel="stylesheet" href="styles/register/register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <main>
        <section>
            <div class="container">
                <form class="" action="" method="post" autocomplete="off">

                    <p>Prihlásenie</p>

                    <div class="forms">
                        <label for="emailorphone">Email alebo cislo</label>
                        <input type="text" name="emailorphone" id = "emailorphone" required value="">
                    </div>

                    <div class="forms">
                        <label for="password">Heslo</label>
                        <input type="password" name="password" id = "password" required value="">
                    </div>

                    <div class="bt">
                        <button type="submit" name="submit">Log In</button>
                    </div>

                    <div class="login">
                        <a class="log" href="register.php">Ešte nemáš účet?/Register</a>
                    </div>
                </form>
            </div>
        </section>
        <section class="textPage">
            <div class="news">
                <h2>Prihlás sa na odber noviniek</h2>
                <p>Ak chceš aby sme ti zasielali nový tovar alebo zľavové akcie, stačí ak zaklikneš políčko pre odber
                    noviniek nižšie. Snažíme sa vytvárať zľavové dni každý mesiac, tak si to nenechaj újsť a ušetri s
                    nami.
                </p>

            </div>
        </section>
    </main>

    <?php include "parts/footer.php"; ?>
</body>

</html>