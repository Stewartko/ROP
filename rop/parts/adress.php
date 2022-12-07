<?php
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");
        $row = mysqli_fetch_assoc($result);
    }
?>

<div class="accInfo">
            <div class="menu">
                <b>Štát</b><br>
                <b>Kraj</b><br>
                <b>Mesto</b><br>
                <b>PSČ</b><br>
                <b>Ulica</b>            
            </div>
            <div class="data">
                <b><?php echo $row["stat"]; ?></b><br>
                <b><?php echo $row["kraj"]; ?></b> <br>
                <b><?php echo $row["mesto"]; ?></b><br>
                <b><?php echo $row["psc"]; ?></b><br>
                <b><?php echo $row["adresa"]; ?></b>
            </div>
</div>