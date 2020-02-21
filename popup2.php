<!DOCTYPE html>
<html>
<head>
	<title>Etud'sup</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="infopopup">
	<?php
echo $_GET["etablissement"];
echo "<br>";
echo $_GET["effectif_total"];
echo "<br>";
echo "<a href='";
echo $_GET["element_wikidata"];
echo "'>Wikidata</a>";
echo "<br>";
echo $_GET["typ_diplome_lib"];
echo "<br>";
echo $_GET["cursus_lmd_lib"];
echo "<br>";
echo $_GET["ins_lib"];
echo "<br>";
echo $_GET["etablissement_lib"];
echo "<br>";
echo $_GET["niveau_lib"];
echo "<br>";
echo $_GET["hommes"];
echo "<br>";
echo $_GET["femmes"];
echo "<br>";


?>
</div>

<input type="submit" name="Submit" value="Fermer la fenetre" onClick="window.close()">
</body>
</html>