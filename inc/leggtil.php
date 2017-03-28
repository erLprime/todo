<?php
header("Content-Type: text/html; charset=utf-8");
?>

<p><h2>Legg til gjøremål:</h2></p>

<?php
//connect
require 'connect.php';

//Sikre skandinaviske tegn
mysqli_query($conn, "SET NAMES 'utf8'");


if(isset($_POST['submit'])) 
{ 
	$todo = ($_POST["todo"]);
	$kategori = ($_POST["kategori"]);
	$beskrivelse = ($_POST["tekst"]);
	$dato = ($_POST["dato"]);
    echo "<p>Gjøremål: <b>" .  $todo . "</b><br>";
	echo "Kategori: <b>" .  $kategori . "</b><br>";
	echo "Beskrivelse: <b>" .  $beskrivelse . "</b><br>";
	echo "Dato: <b>" .  $dato . "</b><br>";
    echo "<br>Bruk skjemaet under til å legge inn flere gjøremål: <br></p>"; 
	
	$sql = "INSERT INTO todo_list (todo, kategori, tekst, dato)
	VALUES ('$todo', '$kategori', '$beskrivelse', '$dato')";
	
	if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

// define variables and set to empty values
$todo = $kategori = $beskrivelse = $dato = "";

?>

<form method="post" action="">

<table>
	<tr>
		<td>
			Gjøremål:
		</td>
		<td>
			<input type="text" size="23" name="todo">
		</td>
	</tr>
	<tr>
		<td>
			Kategori: 
		</td>
		<td>
			<input type="radio" name="kategori" value="skole" checked>skole<br>
			<input type="radio" name="kategori" value="jobb"> jobb<br>
			<input type="radio" name="kategori" value="fritid"> fritid<br>
			<input type="radio" name="kategori" value="annet"> annet<br>
		</td>
	</tr>
	<tr>
		<td>
			Beskrivelse: 
		</td>
		<td>
			<textarea name="tekst" rows="5" cols="23"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Dato: 
		</td>
		<td>
			<input type="datetime-local" name="dato">
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>
</form>

<?php
  
//lukke connection til database
require 'close.php';
?>