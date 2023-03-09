<?php
echo "<h1>DODAWANIE</h1>";

print_r($_POST);

// CONNECTION
$con = mysqli_connect("localhost","root","","moja_baza");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
  echo "CONNECTION OK";
}


if(isset($_POST['add'])){
  if(!empty($_POST['nazwa']) && !empty($_POST['cena'])){
      $addsql = "INSERT INTO produkty (id, nazwa, img, cena) VALUES (NULL,'" . $_POST['nazwa'] ."','" . $_POST['img'] . "','" . $_POST['cena'] ."')";
      if(mysqli_query($con,$addsql)){
          echo "RECORD ADDED";
      } else {
          echo "ADD ERROR";
      };
  } else {
      echo '<p style="color:red">Wypełnij wszystkie pola</p>';
  }
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


echo <<<EOL
<h4>NOWY PRODUKT</h4>
<form method="post">
<div style="display:flex;flex.direction:column;width:300px">
<input name="nazwa" placeholder="Nazwa produktu">
<input name="img" placeholder="url obrazu">
<select name="category">
  <option value="procesory">Procesory</option>
  <option value="gpu">Karty Graficzne</option>
  <option value="memory">Pamięci</option>
</select>
<input name="cena" placeholder="cena" type="number">
<input name="add" type="submit" value="dodaj">
</form>
EOL;
?>