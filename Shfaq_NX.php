<!DOCTYPE html>
<html>
<head>
	<title>Nxënësit</title>
</head>
<body>

	<h2>Nxënësit</h2>

	<form method="post">
		<label for="databaza">Emri i databazës:</label>
		<input type="text" id="databaza" name="databaza" required><br>

		<label for="tabela">Emri i tabelës:</label>
		<input type="text" id="tabela" name="tabela" required><br>

		<input type="submit" name="submit" value="Shfaq të dhënat">
	</form>

	<?php
	// Kontrollo nëse është bërë klikimi në butonin "Shfaq të dhënat"
	if(isset($_POST['submit'])) {

		// Merrni vlerat e shkruara në formë për emrin e databazës dhe tabelës
		$databaza = $_POST['databaza'];
		$tabela = $_POST['tabela'];

		// Krijoni një lidhje me databazën e MySQL
		$conn = mysqli_connect("localhost", "root", "", $databaza);

		// Kontrolloni nëse ka ndonjë gabim në lidhje
		if (!$conn) {
		    die("Lidhja ka dështuar: " . mysqli_connect_error());
		}

		// Krijoni një pyetësor SQL për të marrë të gjithë nxënësit nga tabela e specifikuar
		$sql = "SELECT * FROM $tabela";
		$result = mysqli_query($conn, $sql);

		// Kontrolloni nëse ka ndonjë rresht të dhënash në rezultat
		if (mysqli_num_rows($result) > 0) {
		    // Filloni një tabelë HTML për të shfaqur të dhënat
		    echo "<table>";
		    echo "<tr><th>ID</th><th>Emri</th><th>Mbiemri</th><th>Email</th></tr>";
		    // Përpunoji rreshtat e rezultatit dhe shfaqi në tabelë
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["emri"]. "</td><td>" . $row["mbiemri"]. "</td><td>" . $row["email"]. "</td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "Nuk ka nxënës në tabelën $tabela";
		}

		// Mbyll lidhjen me MySQL
		mysqli_close($conn);
	}

	?>

</body>
</html>
