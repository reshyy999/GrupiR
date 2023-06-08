<!DOCTYPE html>
<html>
<head>
	<title>Fut të dhënat e nxënësit</title>
</head>
<body>

	<h2>Fut të dhënat e nxënësit</h2>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="ID">ID:</label>
		<input type="number" id="ID" name="ID" required><br>
        
        <label for="emri">Emri:</label>
		<input type="text" id="emri" name="emri" required><br>

		<label for="mbiemri">Mbiemri:</label>
		<input type="text" id="mbiemri" name="mbiemri" required><br>

		<label for="email">email:</label>
		<input type="text" id="email" name="email" required><br>

		<label for="databaza">Emri i databazës:</label>
		<input type="text" id="databaza" name="databaza" required><br>

		<label for="tabela">Emri i tabelës:</label>
		<input type="text" id="tabela" name="tabela" required><br>

		<input type="submit" name="submit" value="Ruaj të dhënat">
	</form>

	<?php
		// kontrolloni nëse formulari është plotësuar dhe të dhënat janë dërguar
		if(isset($_POST['submit'])){
			// lidhuni me serverin MySQL
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = $_POST['databaza'];
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// kontrolloni lidhjen
			if (!$conn) {
			    die("Lidhja nuk mund të realizohet: " . mysqli_connect_error());
			}

			// futni të dhënat në tabelën e MySQL
			$sql = "INSERT INTO ".$_POST['tabela']." (ID, emri, mbiemri, email)
			VALUES ('".$_POST['ID']."','".$_POST['emri']."', '".$_POST['mbiemri']."', '".$_POST['email']."')";

			if (mysqli_query($conn, $sql)) {
			    echo "Të dhënat u ruajtën me sukses.";
			} else {
			    echo "Gabim: " . $sql . "<br>" . mysqli_error($conn);
			}

			// mbyllni lidhjen me MySQL
			mysqli_close($conn);
		}
	?>

</body>
    </HTML>
