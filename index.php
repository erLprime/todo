<?php
header("Content-Type: text/html; charset=utf-8");
?>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Todo for Erlend Fors">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP">
	<meta name="author" content="Erlend Moen Fors">
</head>


<p><h1>Erlends gjøremålsliste</h1></p>


<?php
	//meny
	require 'meny.php';
	
	//innhold
	//Div variabler og konfigurasjon for inkludering

$default = "liste";	// fil som velges ved default
$directory = "inc";		// mappe til includefilene
$extension = "php";		// filending

//Inkluderingscript starter her

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

if (!empty($page))											//Undersøker om variabel ikke er tom
		{
		if (file_exists("$directory/$page.$extension"))		//Undersøker om fila eksisterer 
			include("$directory/$page.$extension");			//inkluderer fila
		else
			echo "<h2>Error 404</h2>\n<p>Siden finnes ikke</p>";//Feilmelding om fila ikke eksisterer
		}
	else
		include("$directory/$default.$extension");			//Inkluderer default

	
	//footer
	require 'footer.php';
	
?>