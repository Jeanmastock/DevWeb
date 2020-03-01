<!DOCTYPE html>
<html>
<head>
	<title>Formation</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
<input type="submit" class="button button1" id="haut" name="Submit" value="Fermer la fenêtre" onClick="window.close()">
<div id="vue">
<?php
$name=url_decode($_GET["etablissement"]);
$effectif_total=url_decode($_GET["effectif_total"]);
$Wikidata=url_decode($_GET["element_wikidata"]);
$typ_diplome_lib=url_decode($_GET["typ_diplome_lib"]);
$etablissement_lib=url_decode($_GET["etablissement_lib"]);
$ins_lib=url_decode($_GET["ins_lib"]);
$niveau_lib=url_decode($_GET["niveau_lib"]);
$cursus_lmd_lib=url_decode($_GET["cursus_lmd_lib"]);
$c=0; 
//lien url encode $_GET["etablissement"]
$jsonString = file_get_contents('Compteur/forma.json');
$data = json_decode($jsonString, true);
foreach ($data as $key => $entry) {
    if ($entry['cursus_lmd_lib'] == $cursus_lmd_lib && $entry['niveau_lib'] == $niveau_lib && $entry['ins_lib'] == $ins_lib && $entry['name'] == $name && $entry['effectif_total'] == $effectif_total && $entry['Wikidata'] == $Wikidata && $entry['typ_diplome_lib'] == $typ_diplome_lib && $entry['etablissement_lib'] == $etablissement_lib) {
        $data[$key]['compteur']++;
        echo $data[$key]['compteur'];
        $c=1;
        break;
    }
}
if ($c==0) {
    $data[] = array('name'=>$name,'cursus_lmd_lib'=>$cursus_lmd_lib,'niveau_lib'=>$niveau_lib,'effectif_total'=>$effectif_total,'ins_lib'=>$ins_lib,'Wikidata'=>$Wikidata,'typ_diplome_lib'=>$typ_diplome_lib,'etablissement_lib'=>$etablissement_lib, "compteur"=> "1");
    echo "1";
}
$newJsonString = json_encode($data);
file_put_contents('Compteur/forma.json', $newJsonString);
echo "<i class='material-icons'>remove_red_eye</i>";
echo "</div>";
echo"<div id='infoso'><h1 id='titre_info'>".$typ_diplome_lib."</h1>";
        echo"<h3>Informations sur la formation</h3><br>
        <li><b>Etablissement : </b>".$etablissement_lib."</li><br>
        <li><b>Academie : </b>".url_decode($_GET["ins_lib"])."</li><br>
        <li><b>Code : </b>".$name."</li><br>
        <li><b>Cycle : </b>".url_decode($_GET["cursus_lmd_lib"])."</li><br>
        <li><b>Année : </b>".url_decode($_GET["niveau_lib"])."</li><br>
        <li><b>Effectif : </b>".$effectif_total."</li><br>
        <b>Wikidata : </b><a href=".$Wikidata.">Lien</a><br><br>
        <hr>
        </div>";
        //,$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]
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