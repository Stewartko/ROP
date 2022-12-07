<?php
    $adress = true;

    
    if($_SESSION != TRUE){
        header("Location: index.php");
    }
    if(isset($_POST["submit"])){
        $state = $_POST["state"];
        $region = $_POST["region"];
        $city = $_POST["city"];
        $postCode = $_POST["postCode"];
        $street = $_POST["street"];
        $id = $_SESSION["id"];
        
        $duplicate = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");
        if(mysqli_num_rows($duplicate) == 0){
            $query = "INSERT INTO adresa VALUES('','$state','$region','$city','$postCode','$street', '$id')";
            mysqli_query($conn, $query);
        } else {
            echo "<script> alert('Pre tento účet už existuje adresa'); </script>";
        }
        
    }
?>

<form class="" action="" method="post" autocomplete="off">

                    <p>Adresa</p>

                    <div class="forms">
                        <label for="state">Štát</label>
                        <input type="text" name="state" id = "state" required value="">
                    </div>

                    <div class="forms">
                        <label for="region">Kraj</label>
                        <input type="text" name="region" id = "region" required value="">
                    </div>

                    <div class="forms">
                        <label for="city">Mesto</label>
                        <input type="text" name="city" id = "city" required value="">
                    </div>

                    <div class="forms">
                        <label for="postCode">PSČ</label>
                        <input type="text" name="postCode" id = "postCode" required value="">
                    </div>

                    <div class="forms">
                        <label for="street">Ulica</label>
                        <input type="text" name="street" id = "street" required value="">
                    </div>

                    <div class="bt">
                        <button type="submit" name="submit">Pridať adresu</button>
                    </div>
</form>