<!DOCTYPE html>
<html>
<head>
	<title>Carte</title>
    <meta charset="UTF-8">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>
    <link href="style.css" rel="stylesheet">
		<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	crossorigin=""></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<nav>

<ul>
 <li style="color: var(--b)"><a href="index.php">Etud'Sup</a></li>
  <li><a href="carte.php">Carte</a></li>
  <li><a href="plus.php">En Savoir Plus</a></li>
</ul>
</nav>
<body>
<?php
include("API/API.php");
?>
<div id="conteneur">
    <div class="element">
			<div id="filtre">
			<label>Filtre</label><br>
				<div class="search-container">
					<form action="" method="post">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<div class="tab">
					<?php
					include("API/filtre.php")
					?>
				</div>
			</div>
	</div>
	<!--pagination,liste qui scroll-->
				<script>
			function openCity(evt, cityName) {
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
			    tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
			    tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " active";
			}
			</script>
			<?php 
			$compteur=0;
					if (isset($_POST["search"])) {
						echo "pas encore codé";
					}
					//if !empty diplome 
					if (!empty($_POST["go"])) {
						$dip="";
						$dis="";
						$niv="";
						$reg="";
						$eta="";
						$ucc="";
						$pag="";

						

						if(!empty($_POST["diplome"])){
							foreach($_POST['diplome'] as $val){
								$dip=$dip."&refine.diplome_lib=".$val;
							}
						}
						if(!empty($_POST["formation"])){
							foreach($_POST['formation'] as $val){
								$dis=$dis."&refine.discipline_lib=".$val;
							}
						}
						if(!empty($_POST["secteur"])){
							foreach($_POST['secteur'] as $val){
								$form=$form."&refine.sect_disciplinaire_lib=".$val;
							}
						}
						if(!empty($_POST["cursuslib"])){
							foreach($_POST['cursuslib'] as $val){
								$niv=$niv."&refine.cursus_lmd_lib=".$val;
							}
						}
						if(!empty($_POST["region"])){
							foreach($_POST['region'] as $val){
								$reg=$reg."&refine.reg_ins_lib=".$val;
							}
						}
						if(!empty($_POST["ville"])){
							foreach($_POST['ville'] as $val){
								$ucc=$ucc."&refine.uucr_ins_lib=".$val;
							}
						}
						if(!empty($_POST["etablib"])){
							foreach($_POST['etablib'] as $val){
								$eta=$eta."&refine.etablissement_lib=".$val;
							}
						}
						if(!empty($_POST["pagination"])){
							foreach($_POST['pagination'] as $val){
								$pag=$pag."&rows=".$val;
							}
						}
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18".$dip.$dis.$niv.$reg.$eta.$ucc.$pag."&timezone=Europe/Berlin";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);

						$localisation1=array();
						foreach ($results as $value) {
							array_push($localisation1,$value["fields"]["etablissement"]);
						}



						$localisation2=array();
						for ($i=0; $i < count($localisation1); $i++) { 
						
							 $urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$localisation1[$i];
							//
							 $contents4 = file_get_contents($urlTest);
							//$contents2 = utf8_encode($contents2);

							$results4 = json_decode($contents4, true);
							foreach ($results4["records"] as $value4) {
							array_push($localisation2,array($value4["fields"]["url"],$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]));
							//$value4["fields"]["uo_lib"] 
							}
						}
						}
						
						?>
<div id='mapid'></div>
</div>
<div>
	<?php 
					if (!empty($_POST["go"])) {
							echo "	
								<table>
							  <tr>
								    <th>Diplome</th>
								    <th>Libellé</th>
								    <th>Formation</th>
								    <th>Niveau étude</th>
									<th>Région</th>
									<th>Ville</th>
									<th>Etablissement</th>
									<th>Description</th>
							  </tr>";
							  
								foreach ($results as $value) {
									$compteur+=1;
									echo "<tr>
							    		<td>";
									print($value["fields"]["typ_diplome_lib"]);
									echo "</td>";
									echo "
							    		<td>";
									print($value["fields"]["libelle_intitule_1"]);
									echo "</td>";
									echo "
							    		<td>";
							    	print($value["fields"]["discipline_lib"]);
									echo "</td>";
									echo "
							    		<td>";
							    	print($value["fields"]["cursus_lmd_lib"]);
									echo "</td>";
									echo "
							    		<td>";
									print($value["fields"]["reg_ins_lib"]);
									echo "</td>";
									echo "
							    		<td>";
							    	print($value["fields"]["uucr_ins_lib"]);
									echo "</td>";
									echo "
							    		<td>";
							    		echo"<a href=";
							    		echo'"javascript:PopupCentrer(window.innerWidth-100,window.innerHeight-100,';
							    		echo"'menubar=no,status=no','popup2.php?etablissement=";
							    		print($value["fields"]["etablissement"]);
							    		echo "&effectif_total=";
							    		print($value["fields"]["effectif_total"]);
							    		echo "&element_wikidata=";
							    		print($value["fields"]["element_wikidata"]);
							    		echo "&typ_diplome_lib=";
							    		print($value["fields"]["typ_diplome_lib"]);
							    		echo "&cursus_lmd_lib=";
							    		print($value["fields"]["cursus_lmd_lib"]);
							    		echo "&ins_lib=";
							    		print($value["fields"]["uucr_ins_lib"]);
							    		echo "&etablissement_lib=";
							    		print($value["fields"]["etablissement_lib"]);
							    		echo "&niveau_lib=";
							    		print($value["fields"]["niveau_lib"]);
							    		echo"')";
							    		echo'">';
									print($value["fields"]["etablissement_lib"]);
									echo "</a></td>";?>
							    		<td><?php
							    		echo"<a href=";
							    		echo'"javascript:PopupCentrer(window.innerWidth-100,window.innerHeight-100,';
							    		echo"'menubar=no,status=no','popup.php?etablissement=";
							    		print($value["fields"]["etablissement"]);
							    		echo "&effectif_total=";
							    		print($value["fields"]["effectif_total"]);
							    		echo "&element_wikidata=";
							    		print($value["fields"]["element_wikidata"]);
							    		echo "&typ_diplome_lib=";
							    		print($value["fields"]["typ_diplome_lib"]);
							    		echo "&cursus_lmd_lib=";
							    		print($value["fields"]["cursus_lmd_lib"]);
							    		echo "&ins_lib=";
							    		print($value["fields"]["uucr_ins_lib"]);
							    		echo "&etablissement_lib=";
							    		print($value["fields"]["etablissement_lib"]);
							    		echo "&niveau_lib=";
							    		print($value["fields"]["niveau_lib"]);
							    		echo "&hommes=";
							    		print($value["fields"]["hommes"]);
							    		echo "&femmes=";
							    		print($value["fields"]["femmes"]);
							    		echo"')";
							    		echo'">';
							    		?>


							    		
							    		<i class="material-icons">info</i></a></td></tr>
							    	<?php
								}
								echo "<table>";
								}
								echo "<div id='compteur'>";
								echo $compteur;
								echo " Resultats Trouvés</div>";
								?>
</div>
</body>
<script>
var mymap = L.map('mapid').setView([48.8391838, 2.5875129472268648], 5)
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: 'Théo',
		    maxZoom: 18,
		    id: 'mapbox/streets-v11',
		    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		}).addTo(mymap);
			<?php
					if (!empty($_POST["go"])) {
						for($i = 0; $i < count($localisation2);$i++) {
						echo'L.marker(['.$localisation2[$i][1].','.$localisation2[$i][2].']).addTo(mymap).bindPopup("'."<a href='".$localisation2[$i][0]."' target='about:blank'>".$localisation2[$i][0]."</a>".'");
						';
               			 }
               		}
    		?>
</script>
						<script>
						function PopupCentrer(largeur, hauteur, options,page) {
  var top=(screen.height-hauteur)/2;
  var left=(screen.width-largeur)/2;
  window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
}
</script>
							

</div>
<div id="footer">
	<a href="#">Pour en savoir plus</a>
</div>
</body>
</html>
