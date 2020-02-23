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

<?php
$name=$_GET["etablissement"];
$url="https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.etablissement=".$name."&timezone=Europe/Berlin";
$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
$contents = file_get_contents($url.$key);
$results = json_decode($contents, true);

$urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$name;
 $contents4 = file_get_contents($urlTest);
$results4 = json_decode($contents4, true);


foreach ($results4["records"] as $value4) {
	echo"<div id='infos'><h3 id='titre_info'>".$value4["fields"]["uo_lib"]."</h3>";
		echo"<h3>Informations sur l'établissement</h3>
		<b>Site web : </b><a href='".$value4["fields"]["url"]."'>Lien</a>
		<b>Wikidata : </b><a href='".$value4["fields"]["element_wikidata"]."'>Lien</a>
		<li><b>Adresse : </b>".$value4["fields"]["adresse_uai"]."</li>
		</div>";
		//,$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]

		}
echo"
</div>
";

foreach ($results as $value) {
	echo "<div id='infos'>
	<p id='pinfo'><h3>Informations générales</h3>
	<li><b>Academie : </b>".$value["fields"]["etablissement_lib"]."</li>
	<li><b>Type de diplome : </b>".$value["fields"]["etablissement_lib"]."</li>
	<li><b>Secteur : </b>".$value["fields"]["etablissement_lib"]."</li></p><br>
	<hr>
	<p id='pinfo'><h3>Informations sur les étudiants</h3><li><b>Nombre d'étudiants inscrits l'année derniere : </b>".$value["fields"]["effectif_total"]."</li>
	<li><b>Nombres d'Hommes et de Femmes : </b>".$value["fields"]["hommes"]." hommes et ".$value["fields"]["femmes"]." femmes</li></p><br>
	<hr>";
	
	echo'</div>';
	}
?>

<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">

</body>
</html>