<!DOCTYPE html>
<html>
<head>
  <title>Krijo një tabelë në MySQL</title>
</head>
<body>
  <h1>Krijo një tabelë në MySQL</h1>
  <p>Përdorni formën më poshtë për të krijuar një tabelë në MySQL:</p>

  <form method="post">
    Emri i serverit:<br>
    <input type="text" name="servername"><br>
    Emri i përdoruesit:<br>
    <input type="text" name="username"><br>
    Fjalëkalimi:<br>
    <input type="password" name="password"><br>
    Emri i bazës së të dhënave:<br>
    <input type="text" name="dbname"><br><br>
    Emri i tabelës:<br>
    <input type="text" name="tablename"><br><br>
    Fushat e tabelës (me presje të ndara):<br>
    <input type="text" name="fields"><br><br>
    <input type="submit" value="Krijo tabelën">
  </form>

  <?php
  // kontrolloni nëse forma është dorëzuar
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // merrni vlerat e formës
      $servername = $_POST["servername"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $dbname = $_POST["dbname"];
      $tablename = $_POST["tablename"];
      $fields = $_POST["fields"];

      // krijo lidhjen me MySQL
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // kontrolloni lidhjen
      if (!$conn) {
          die("Lidhja dështoi: " . mysqli_connect_error());
      }

      // krijo tabelën
      $sql = "CREATE TABLE $tablename ($fields)";
      if (mysqli_query($conn, $sql)) {
          echo "<p>Tabela është krijuar me sukses!</p>";
      } else {
          echo "<p>Krijimi i tabelës dështoi: " . mysqli_error($conn) . "</p>";
      }

      // mbyll lidhjen me MySQL
      mysqli_close($conn);
  }
  ?>

</body>
</html>
