<html>
<head>
<title>Page Title</title>
</head>
<body>

<form action="vorlage.php" method="post">
<label for="filter">Filter:</label><br>
<input type="text" id="filter" name="lname"><br><br>

<input type="submit" value="Submit">
</form>

<!--Tabelle //-->

<?php
    if (!empty($_POST['filter'])) {
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<tr>
    <td>Erste Spalte</td>
    <td>Zweite Spalte</td>
    <td>Dritte Spalte</td><br>";	

  // Daten der einzelnen Rows ausgeben.
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

//Zur Sicherheit schließen
$conn->close();
}
?>


</body>
</html>