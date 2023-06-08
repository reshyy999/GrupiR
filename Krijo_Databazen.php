<!DOCTYPE html>
<html>
<head>
  <title>Krijo një bazë të të dhënave MySQL</title>
</head>
<body>
  <h1>Krijo një bazë të të dhënave MySQL</h1>
  <p>Përdorni formën më poshtë për të krijuar një bazë të të dhënave MySQL:</p>

  <form method="post">
    Emri i serverit:<br>
    <input type="text" name="servername"><br>
    Emri i përdoruesit:<br>
    <input type="text" name="username"><br>
    Fjalëkalimi:<br>
    <input type="password" name="password"><br>
    Emri i bazës së të dhënave:<br>
    <input type="text" name="dbname"><br><br>
    <input type="submit" value="Krijo bazën e të dhënave">
  </form>

  <?php
  // kontrolloni nëse forma është dorëzuar
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // merrni vlerat e formës
      $servername = $_POST["servername"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $dbname = $_POST["dbname"];

      // krijo lidhjen me MySQL
      $conn = mysqli_connect($servername, $username, $password);

      // kontrolloni lidhjen
      if (!$conn) {
          die("Lidhja dështoi: " . mysqli_connect_error());
      }

      // krijo bazën e të dhënave
      $sql = "CREATE DATABASE $dbname";
      if (mysqli_query($conn, $sql)) {
          echo "<p>Baza e të dhënave është krijuar me sukses!</p>";
      } else {
          echo "<p>Krijimi i bazës së të dhënave dështoi: " . mysqli_error($conn) . "</p>";
      }

      // mbyll lidhjen me MySQL
      mysqli_close($conn);
  }
  ?>

</body>
</html>
