<!DOCTYPE html>
<html>
<head>
	<title>Etablissement</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="favicon.png">
	<style>
		body{
			background-color: #A0B5F7;
			text-align: center;
		    background-size: cover;
		}
	</style>
</head>
<body>
<h1 id="haut"><span>Etud'Sup</span></h1>
<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">

<?php
$name=$_GET["etablissement"];
$c=0; 
$jsonString = file_get_contents('Compteur/etab.json');
$data = json_decode($jsonString, true);
foreach ($data as $key => $entry) {
    if ($entry['name'] == $name) {
        $data[$key]['compteur']++;
        echo $data[$key]['compteur'];
        $c=1;
        break;
    }
}
if ($c==0) {
	$data[] = array('name'=>$name , "compteur"=> "1");
	echo "1";
}
$newJsonString = json_encode($data);
file_put_contents('Compteur/etab.json', $newJsonString);


$url="https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.etablissement=".$name."&timezone=Europe/Berlin";
$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
$contents = file_get_contents($url.$key);
$results = json_decode($contents, true);

$urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$name."&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
 $contents4 = file_get_contents($urlTest);
$results4 = json_decode($contents4, true);

foreach ($results4["records"] as $value4) {
	echo"<div id='infoso'><h1 id='titre_info'>".$value4["fields"]["uo_lib"]."</h1>";
		echo"<h3>Informations sur l'établissement</h3>
		<b>Site web : </b><a href='".$value4["fields"]["url"]."'>Lien</a>
		<b>Wikidata : </b><a href='".$value4["fields"]["element_wikidata"]."'>Lien</a>
		<li><b>Adresse : </b>".$value4["fields"]["adresse_uai"]."</li>
		<li><b>Academie : </b>".$value4["fields"]["com_nom"]."</li>
		<li><b>Numéro : </b>".$value4["fields"]["numero_telephone_uai"]."</li>
		</div>";
		//,$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]

		}

foreach ($results as $value) {
	echo "<div id='infos'>
	<p id='pinfo'><h3>Informations générales</h3>
	<li><b>Nom diplome : </b>".$value["fields"]["libelle_intitule_1"]."</li>
	<li><b>Type de diplome : </b>".$value["fields"]["typ_diplome_lib"]."</li>
	<li><b>Secteur : </b>".$value["fields"]["sect_disciplinaire_lib"]."</li></p><br>
	<hr>
	<p id='pinfo'><h3>Informations sur les étudiants</h3><li><b>Nombre d'étudiants inscrits l'année derniere : </b>".$value["fields"]["effectif_total"]."</li>
	<li><b>Nombres d'Hommes et de Femmes : </b>";
	if(!isset($value["fields"]["hommes"])){echo"Pas disponible";}else{echo $value["fields"]["hommes"];}
		echo" hommes et ";
	if(!isset($value["fields"]["femmes"])){echo"Pas disponible";}else{echo $value["fields"]["femmes"];}
		echo" femmes</li></p><br>
	<hr>";
	
	echo'</div>';
	}
?>

<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">
<div><a id="cRetour" class="cInvisible" href="#haut"></a></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
  };
});
</script>
</body>
</html>