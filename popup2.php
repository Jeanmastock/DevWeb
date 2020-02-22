<!DOCTYPE html>
<html>
<head>
	<title>Etud'sup</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">
<div id="infos">
	<?php
	include("API/API.php");
echo searchetab($_GET["etablissement"]);


?>
</div>


</body>
</html>