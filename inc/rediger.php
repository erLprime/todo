<?php
header("Content-Type: text/html; charset=utf-8");
?>
<?php echo htmlspecialchars($_POST['redigerid']); ?>.
<?php
//connect
require 'connect.php';

//Sikre skandinaviske tegn
mysqli_query($conn, "SET NAMES 'utf8'");
