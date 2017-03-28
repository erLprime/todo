
hei

<?php $redigerid = $_POST["redigerid"]; ?>

<?php

echo $redigerid;
//connect
require 'connect.php';

//Sikre skandinaviske tegn
mysqli_query($conn, "SET NAMES 'utf8'");
	
	$sql = "DELETE FROM todo_list WHERE id=$redigerid";

if (mysqli_query($conn, $sql)) {
    
} else {
	echo 'Feil: Klarte ikke å slette gjøremål';
}



//lukke connection til database
require 'close.php';


header("Location: ?page=oppdater");
die();
?>