<?php
echo "<h1>Sklep</h1>";

// CONNECTION
$con = mysqli_connect("localhost","root","","moja_baza");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
  echo "CONNECTION OK";
}

$sql = "SELECT * FROM produkty";

$result = mysqli_query($con,$sql);

echo '<table border="1">';
while($row = mysqli_fetch_assoc($result)){

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nazwa'] . "</td>";
    echo "<td>" . $row['img'] . "</td>";
    echo "<td>" . $row['cena'] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>