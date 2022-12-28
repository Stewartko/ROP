<?php
    include("config.php");
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM adresa WHERE idZakaznika = $id");

    while($res = mysqli_fetch_array($result)) {
        $state = $res["stat"];
        $region = $res["kraj"];
        $city = $res["mesto"];
        $postCode = $res["psc"];
        $street = $res["adresa"];
        $idAdress = $res["idAdresa"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="form1" method="post" action="editprocess.php">
		<table border="0">
			<tr>
				<td>Štát</td>
				<td><input type="text" name="state" value="<?php echo $state;?>"></td>
			</tr>
			<tr>
				<td>Región</td>
				<td><input type="text" name="region" value="<?php echo $region;?>"></td>
			</tr>
		    <tr> 
				<td>Mesto</td>
				<td><input type="text" name="city" value="<?php echo $city;?>"></td>
			</tr>
            <tr>
				<td>PSČ</td>
				<td><input type="text" name="postCode" value="<?php echo $postCode;?>"></td>
			</tr>
		    <tr> 
				<td>Ulica</td>
				<td><input type="text" name="street" value="<?php echo $street;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $idAdress;?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>