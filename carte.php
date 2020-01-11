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
</head>
<nav>

<ul>
 <li style="color: var(--b)"><a href="index.php">Etud'Sup</a></li>
  <li><a href="carte.php">Carte</a></li>
  <li><a href="plus.php">En Savoir Plus</a></li>
</ul>
</nav>
<body>
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
					<form method="post">
							<input type="button" class="tablinks button1" onclick="openCity(event, 'diplome')" value="Diplome▼"><br>
					  <div id="diplome" class="tabcontent">
							<!--<select name="diplome" id="">-->
								  	<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=diplome_lib&facet=diplome";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][0]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='diplome[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
							<!--</select>-->
						</div>

						<input type="button" class="tablinks button1" onclick="openCity(event, 'formation')" value="Formation▼"><br>
						  <div id="formation" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=discipline_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][0]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='formation[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
							</div>


						<input type="button" class="tablinks button1" onclick="openCity(event, 'cursuslib')" value="Niveaux Etude▼"><br>
					  <div id="cursuslib" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=cursus_lmd_lib&facet=cursus_lmd_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][1]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='cursuslib[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
							</div>

							<input type="button" class="tablinks button1" onclick="openCity(event, 'region')" value="Région▼"><br>
					  <div id="region" class="tabcontent">
							<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=reg_etab_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][0]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='region[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
						</div>


						<input type="button" class="tablinks button1" onclick="openCity(event, 'ville')" value="Ville▼"><br>
					  	<div id="ville" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=uucr_ins_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][0]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='ville[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
							</div>

						<input type="button" class="tablinks button1" onclick="openCity(event, 'etablib')" value="Etablissement▼"><br>
					  <div id="etablib" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=etablissement_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								//$contents = utf8_encode($contents);
								$results = json_decode($contents, true);
								foreach ($results["facet_groups"][0]["facets"] as $value) {
									echo "<label class='container'>".$value["name"];
								  echo "<input type='checkbox' name='etablib[]' value='".$value["name"]."'>";
								 echo " <span class='checkmark'></span>";
								echo "</label>";
									/*echo "<option value='".$value["name"]."'>";
									print($value["name"]);
									echo "</option>";*/
								}
								 ?>
							</div>

						<input type="reset" value="Reset"><br>
						<input type="submit" value="Confirmer" class="button button1" name="go" />
						</form>
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

						if (empty($_POST["diplome"]) && empty($_POST["formation"]) && empty($_POST["cursuslib"]) && empty($_POST["region"]) && empty($_POST["ville"]) && empty($_POST["etablib"])) {
							echo "aucune donnée";
							return;
						}

						

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
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18".$dip.$dis.$niv.$reg.$eta.$ucc."&timezone=Europe/Berlin";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);

						$localisation1=array();
						foreach ($results as $value) {
							array_push($localisation1,$value["fields"]["etablissement"]);
						}
						echo count($localisation1);

						$url2= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur";
						$contents2 = file_get_contents($url2);
						//$contents2 = utf8_encode($contents2);
						$results2 = json_decode($contents2, true);



						$url3= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&facet=uai&facet=type_d_etablissement&facet=com_nom&facet=dep_nom&facet=aca_nom&facet=reg_nom&facet=pays_etranger_acheminement";
						$contents3 = file_get_contents($url3);
						//$contents2 = utf8_encode($contents2);
						$results3 = json_decode($contents3, true);


						$localisation2=array();
						for ($i=0; $i < count($localisation1); $i++) { 
						
							 $urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$localisation1[$i];
							//
							 $contents4 = file_get_contents($urlTest);
							//$contents2 = utf8_encode($contents2);

							$results4 = json_decode($contents4, true);
							foreach ($results4["records"] as $value4) {
							array_push($localisation2,array($value4["fields"]["url"],$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]));
							/*echo "<br>";
							echo $i;
							echo "<br>";
							print($value4["fields"]["url"]);
							print($value4["fields"]["coordonnees"][0]);
							echo "<br>";
							print($value4["fields"]["coordonnees"][1]);*/

							}
						}
						for($i = 0; $i < count($localisation2);$i++) {
                   		 echo'L.marker(['.$localisation2[$i][1].','.$localisation2[$i][2].', {icon: custom}]).addTo(mymap).bindPopup("'."<a href='".$localisation2[$i][0]."' target='about:blank'>".$localisation2[$i][0]."</a>".'");';
               			 }
						}
						?>
<div id="mapid"></div>


</div>

</body>
<script>
var mymap = L.map('mapid').setView([48.8391838, 2.5875129472268648], 5);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Théo',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: "pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw"
}).addTo(mymap);
	</script>
</html>
