<?php
header("Content-Type: text/html; charset=utf-8");
?>

<p><h2>Oppdater:</h2></p>

<?php
//connect
require 'connect.php';

//Sikre skandinaviske tegn
mysqli_query($conn, "SET NAMES 'utf8'");


//Hent liste over gjøremål
$sql = "SELECT * FROM todo_list ORDER BY dato ASC";
$result = mysqli_query($conn, $sql);
$redigerid = "";

if (mysqli_num_rows($result) > 0) {
    // output data for hver rad
	echo "<table border='1' style='width:480px'><tr><th>Gjøremål</th><th>Kategori</th><th>Beskrivelse</th><th>Dato</th><th>Rediger</th><th>Slett</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["todo"]."</td><td>".$row["kategori"]."</td><td>".$row["tekst"]."</td><td>".$row["dato"]."</td></td>";
		
		//Redigeringsknapp
		echo '<td><form action="?page=rediger" method="post"><input type="hidden" name="redigerid" value="' . $row['id'] . '">';
		echo '<input type="submit" value="Rediger">';
		echo '</form>';
		echo "</td>";
		
		//Sletteknapp
		echo '<td><form action="?page=slett" method="post"><input type="hidden" name="redigerid" value="' . $row['id'] . '">';
		echo '<input type="submit" value="Slett">';
		echo '</form>';
		echo "</td></tr>";
		
		
    }
	echo "</table>";
} else {
    echo "Ingen gjøremål ble funnet";
}
//lukke connection til database
require 'close.php';
?>