<?php
    include("config.php");
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM zakaznik WHERE idZakaznika = $id");

    while($res = mysqli_fetch_array($result)) {
        $name = $res["meno"];
        $surname = $res["priezvisko"];
        $email = $res["email"];
        $phone = $res["mobil"];
        $idZakaznika = $res["idZakaznika"];
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
    <form name="form1" method="post" action="procesData.php">
		<table border="0">
			<tr>
				<td>Meno</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>Priezvisko</td>
				<td><input type="text" name="surname" value="<?php echo $surname;?>"></td>
			</tr>
		    <tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
            <tr>
				<td>Cislo</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $idZakaznika;?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>