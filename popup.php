<!DOCTYPE html>
<html>
<head>
	<title>Formation</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
<h1 id="haut">Etud-Sup</h1>
<input type="submit" class="button button1" name="Submit" value="Fermer la fenêtre" onClick="window.close()">
<div id="infopopup">
<?php
$c=0; 
//lien url encode $_GET["etablissement"]
$jsonString = file_get_contents('compteur/forma.json');
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
file_put_contents('compteur/forma.json', $newJsonString);


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