<?php
include 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = $_POST["email"];
    $phone = test_input($_POST["phone"]);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    if (!empty($_POST["sub"])) {
        $sub = $_POST["sub"];
    } else {
        $sub = 'false';
    }
    $duplicate = mysqli_query($conn, "SELECT * FROM zakaznik WHERE mobil = '$phone' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Telefónne číslo alebo email je už zaregistrovaný'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $password = password_hash($password, PASSWORD_BCRYPT, $options = ['adaminkovewlkzsokasmpvb7udsygypaujduirfngbposihoyptgnoifjbkmsokpyuiryotpgh9sblfkjjh-9piusrtoisbksfdiophju']);
            $query = "INSERT INTO zakaznik VALUES('','$firstName','$lastName','$email','$phone','$password', '$sub')";
            mysqli_query($conn, $query);
            require 'generateEmail.php';
            sendMail($email, 'Ďakujeme za registráciu.', 'Vaša registrácia bola úspešná.');
            echo "<script> alert('Registrácia úspešná'); </script>";
        } else {
            echo "<script> alert('Heslá sa nezhodujú'); </script>";
        }
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Registrácia</title>
    <link rel="icon" type="image/png" href="media/logo/gprotect-01.svg" />
</head>

<body>
    <?php include 'parts/header.php'; ?>
    <main>
        <section>
            <div class="container">
                <div class="head">
                    <p>Registrácia</p>

                    <div class="underline"></div>
                </div>

                <form class="form" action="" method="post" id="form">
                    <div class="forms">
                        <label for="firstName">Meno</label>
                        <input type="text" name="firstName" id="firstName" required value="" placeholder="Meno" pattern="<?php echo $patternInput; ?>" title="Meno môže obsahovať znaky slovenskej abecedy a nesmie obsahovať viac ako 30 znakov.">
                        <div class="error"></div>
                    </div>

                    <div class="forms">
                        <label for="lastName">Priezvisko</label>
                        <input type="text" name="lastName" id="lastName" value="" placeholder="Priezvisko" required pattern="<?php echo $patternInput; ?>" title="Priezvisko môže obsahovať znaky slovenskej abecedy.">
                        <div class="error"></div>
                    </div>

                    <div class="forms">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="" placeholder="email@gmail.com" required pattern="<?php echo $patternEmail; ?>" title="Formát emailu.">
                        <div class="error"></div>
                    </div>

                    <div class="forms">
                        <label for="phone">Tel. číslo</label>
                        <input type="text" name="phone" id="phone" value="" placeholder="+421123456789" required pattern="<?php echo $patternPhone; ?>" title="Telefónne číslo musí obsahovať slovenskú alebo českú predvoľbu.">
                        <div class="error"></div>
                    </div>

                    <div class="forms">
                        <label for="password">Heslo</label>
                        <input type="password" name="password" id="password" value="" placeholder="Najmenej 6 znakov" required pattern="<?php echo $patternPass; ?>" title="Heslo musí obsahovať najmenej 6 znakov.">
                        <div class="error"></div>
                    </div>

                    <div class="forms">
                        <label for="confirmpassword">Heslo</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="" placeholder="Zopakuj heslo" required pattern="<?php echo $patternPass; ?>" title="Heslo musí obsahovať najmenej 6 znakov.">
                        <div class="error"></div>
                    </div>

                    <div class="news">
                        <div class="check">
                            <input type="checkbox" name="sub" id="sub" value="true">
                            <h4>Prihlas sa na odber noviniek</h4>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum aperiam, delectus nisi deserunt explicabo tempora? Ab sit minus inventore amet aliquam quisquam natus perferendis dignissimos laborum, maxime aspernatur, illum, pariatur iste facere impedit saepe vero ex modi voluptatibus debitis? Beatae temporibus facere natus aperiam magni rerum inventore exercitationem dolorum excepturi.</p>
                        </div>
                        <div class="check">
                            <input type="checkbox" require name="gdpr" id="gdpr" value="true">
                            <h4>Suhlasím so spracovaním osobných údajov.</h4>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="bt">
                        <button type="submit" name="submit">Register</button>
                    </div>
                    <div class="login">
                        <a class="log" href="login.php">Už máš účet?/Log In</a>
                    </div>
                </form>
            </div>


        </section>

        <section class="textPage">
            <div class="pros">
                <div class="text">
                    <h2>Prečo sa zaregistrovať?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
                <div class="text">
                    <h2>Aké výhody získaš?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
                <div class="text">
                    <h2>Výhodnejšie ponuky</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas odit eum ipsum. Odio esse
                        temporibus culpa? Deleniti unde minus ipsum, ad nihil molestiae explicabo iste doloribus ab
                        fugit? Quibusdam, quis?</p>
                </div>
            </div>
        </section>
    </main>

    <?php include "parts/footer.php"; ?>
</body>
<script src="javascript/main.js"></script>
<!-- <script defer src="javascript/validate.js"></script> -->

</html>