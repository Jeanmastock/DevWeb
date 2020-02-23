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
<div id="infopopup">
	<?php
echo utf8_decode($_GET["etablissement"]);
echo "<br>";
echo utf8_decode($_GET["effectif_total"]);
echo "<br>";
echo "<a href='";
echo utf8_decode($_GET["element_wikidata"]);
echo "'>Wikidata</a>";
echo "<br>";
echo utf8_decode($_GET["typ_diplome_lib"]);
echo "<br>";
echo utf8_decode($_GET["cursus_lmd_lib"]);
echo "<br>";
echo utf8_decode($_GET["ins_lib"]);
echo "<br>";
echo utf8_decode($_GET["etablissement_lib"]);
echo "<br>";
echo utf8_decode($_GET["niveau_lib"]);
echo "<br>";
?>
</div>
<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">

</body>
</html>