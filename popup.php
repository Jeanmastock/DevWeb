<!DOCTYPE html>
<html>
<head>
	<title>Formation</title>
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
    <?php
include("API/API.php");
?>
<h1 id="haut">Etud-Sup</h1>
<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">
<div id="infopopup">
<?php
$name=url_decode($_GET["etablissement"]);
$effectif_total=url_decode($_GET["effectif_total"]);
$Wikidata=url_decode($_GET["element_wikidata"]);
$typ_diplome_lib=url_decode($_GET["typ_diplome_lib"]);
$etablissement_lib=url_decode($_GET["etablissement_lib"]);
$c=0; 
//lien url encode $_GET["etablissement"]
$jsonString = file_get_contents('Compteur/forma.json');
$data = json_decode($jsonString, true);
foreach ($data as $key => $entry) {
    if ($entry['name'] == $name.$effectif_total.$Wikidata.$typ_diplome_lib.$etablissement_lib) {
        $data[$key]['compteur']++;
        echo $data[$key]['compteur'];
        $c=1;
        break;
    }
}
if ($c==0) {
	$data[] = array('name'=>$name.$effectif_total.$Wikidata.$typ_diplome_lib.$etablissement_lib , "compteur"=> "1");
	echo "1";
}
$newJsonString = json_encode($data);
file_put_contents('Compteur/forma.json', $newJsonString);

echo"<div id='infoso'><h1 id='titre_info'>".$etablissement_lib."</h1>";
        echo"<h3>Informations sur l'établissement</h3><br>
        <li><b>Diplome : </b>".$typ_diplome_lib."</li><br>
        <li><b>Academie : </b>".url_decode($_GET["ins_lib"])."</li><br>
        <li><b>Code : </b>".$name."</li><br>
        <li><b>Cycle : </b>".url_decode($_GET["cursus_lmd_lib"])."</li><br>
        <li><b>Année : </b>".url_decode($_GET["niveau_lib"])."</li><br>
        <li><b>Effectif : </b>".$effectif_total."</li><br>
        <li><b>Wikidata : </b>".$Wikidata."</li><br><br>
        <hr>
        </div>";
        //,$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]

$urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$name."&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
 $contents4 = file_get_contents($urlTest);
$results4 = json_decode($contents4, true);

foreach ($results4["records"] as $value4) {
    echo $value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1];
}
?>
</div>
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