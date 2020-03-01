<!DOCTYPE html>
<html>
<head>
	<title>Etud-Sup</title>
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
     <link rel="icon" type="image/png" href="favicon.png">
     <style>
     	body{
     		    text-align: center;
			    background-image: url("img.jpg");
			    background-size: cover;
     	}
     </style>
</head>
<nav>
<ul>
 <li style="color: var(--b)" id="haut"><a href="index.php">Etud'Sup</a></li>
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
					<form action="index.php" method="post">
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
			// Top 3 formation
					if (empty($_POST["go"])&&empty($_POST["search"])) {
						echo"<div id='top'>
				      <h3>Les formations les plus vues</h3>";
				      
				        $max1 = 0;
				        $max2 = 0;
				        $max3 = 0;

				        $cle1= "";
				        $cle2= "";
				        $cle3= "";

				        $dom1= "";
				        $dom2= "";
				        $dom3= "";

				        $form1= "";
				        $form2= "";
				        $form3= "";

				        $annee1="";
				        $annee2="";
				        $annee3="";

				        $url= "Compteur/forma.json";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);

				          foreach($results as $cle => $valeur){
				          	 if ($valeur["compteur"] > $max3){
				          	 	$max1 = $max2;
					            $cle1 = $cle2;
					            $dom1 = $dom2;
					            $form1 = $form2;
					            $annee1 = $annee2;

					            $max2 = $max3;
					            $cle2 = $cle3;
					            $dom2 = $dom3;
					            $form2 = $form3;
					            $annee2 = $annee3;

					            $max3 = $valeur["compteur"];
					             $cle3 = $results[$cle]["name"];
					            $dom3 = $results[$cle]["ins_lib"];
					            $form3 = $results[$cle]["typ_diplome_lib"];
					            $annee3 =$results[$cle]["effectif_total"];
				          	 }
				           elseif ($valeur["compteur"] > $max2 && $valeur["compteur"] < $max3){
				            $max1 = $max2;
				            $cle1 = $cle2;
				            $dom1 = $dom2;
				            $form1 = $form2;
				            $annee1 = $annee2;

				            $max2 =$valeur["compteur"];
				            $cle2 = $results[$cle]["name"];
				            $dom2 = $results[$cle]["ins_lib"];
				            $form2 = $results[$cle]["typ_diplome_lib"];
				            $annee2 =$results[$cle]["effectif_total"];
				          }

				          elseif ($valeur["compteur"] > $max1 && $valeur["compteur"] < $max2){
				            $max1 = $valeur["compteur"];
				             $cle1 = $results[$cle]["name"];
				            $dom1 = $results[$cle]["ins_lib"];
				            $form1 = $results[$cle]["typ_diplome_lib"];
				            $annee1 =$results[$cle]["effectif_total"];
				          }
				      }

				      $url3 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=1&sort=-rentree_lib&facet=etablissement_lib&facet=typ_diplome_lib&facet=disciplines_selection&facet=dep_etab_lib&refine.rentree_lib=2017-18";
				    echo "TOP 1";
				    echo "<br>";
			        top($url3,$cle3,$dom3,$form3,$annee3);
			         echo "<br>";
			        echo "TOP 2";
			         echo "<br>";
			        top($url3,$cle2,$dom2,$form2,$annee2);
			        echo "<br>";
			        echo "TOP 3";
			        echo "<br>";
			        top($url3,$cle1,$dom1,$form1,$annee1);
			        echo "<br>";
		    		
		    		echo"</div>";
						

					}
					//barre de recherche
					if (isset($_POST["search"])) {
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&q=".url_encode($_POST["search"])."&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);
					}
					//recher avec filtre
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
						if(!empty($_POST["niveau_lib"])){
							foreach($_POST['niveau_lib'] as $val){
								$niv=$niv."&refine.niveau_lib=".$val;
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
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18".$dip.$dis.$niv.$reg.$eta.$ucc.$pag."&timezone=Europe/Berlin&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);
						if (empty($_POST["mapindex"])) {
						$localisation2=array();
						foreach ($results as $value) {

							 $urlTest = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&sort=uo_lib&facet=uai&refine.uai=".$value["fields"]["etablissement"]."&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
							//
							 $contents4 = file_get_contents($urlTest);
							//$contents2 = utf8_encode($contents2);

							$results4 = json_decode($contents4, true);
							foreach ($results4["records"] as $value4) {
								if(!in_array(array($value4["fields"]["uo_lib"],$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]), $localisation2)) {
									array_push($localisation2,array($value4["fields"]["uo_lib"],$value4["fields"]["coordonnees"][0],$value4["fields"]["coordonnees"][1]));
									//$value4["fields"]["uo_lib"] 
								}
							}
						}
						}



						
						
						}
						
						?>
<div id='mapid'></div>
</div>
<div>
	<?php 
	//table resultat filtre
					if (!empty($_POST["go"])||isset($_POST["search"])) {
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
							    	print($value["fields"]["niveau_lib"]);
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
							    		//pop up
							    		echo"<a href=";
							    		echo'"javascript:PopupCentrer(window.innerWidth-100,window.innerHeight-100,';
							    		echo"'menubar=no,status=no','popup2.php?etablissement=";
							    		print($value["fields"]["etablissement"]);
							    		echo"')";
							    		echo'">';
									print($value["fields"]["etablissement_lib"]);
									echo "</a></td>";?>
							    		<td><?php
							    		echo"<a href=";
							    		echo'"javascript:PopupCentrer(window.innerWidth-100,window.innerHeight-100,';
							    		echo"'menubar=no,status=no','popup.php?etablissement=";
							    		print(url_encode($value["fields"]["etablissement"]));
							    		echo "&effectif_total=";
							    		print(url_encode($value["fields"]["effectif_total"]));
							    		echo "&element_wikidata=";
							    		print(url_encode($value["fields"]["element_wikidata"]));
							    		echo "&typ_diplome_lib=";
							    		print(url_encode($value["fields"]["diplome_lib"]));
							    		echo "&cursus_lmd_lib=";
							    		print(url_encode($value["fields"]["cursus_lmd_lib"]));
							    		echo "&ins_lib=";
							    		print(url_encode($value["fields"]["uucr_ins_lib"]));
							    		echo "&etablissement_lib=";
							    		print(url_encode($value["fields"]["etablissement_lib"]));
							    		echo "&niveau_lib=";
							    		print(url_encode($value["fields"]["niveau_lib"]));
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
<div><a id="cRetour" class="cInvisible" href="#haut"></a></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
  };
});

var mymap = L.map('mapid').setView([48.8391838, 2.5875129472268648], 5)
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: 'Etud-Sup',
		    maxZoom: 18,
		    id: 'mapbox/streets-v11',
		    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		}).addTo(mymap);
			<?php
					if (!empty($_POST["go"]) && empty($_POST["mapindex"])) {
						//liste des marqueurs
						for($i = 0; $i < count($localisation2);$i++) {
						echo'L.marker(['.$localisation2[$i][1].','.$localisation2[$i][2].']).addTo(mymap).bindPopup("'.$localisation2[$i][0].'");
						';
               			 }
               		}
    		?>
						function PopupCentrer(largeur, hauteur, options,page) {
  var top=(screen.height-hauteur)/2;
  var left=(screen.width-largeur)/2;
  window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
}
</script>
							

</div>
<div id="footer">
	<a href="https://github.com/Jeanmastock/Etud-sup">Pour en savoir plus</a>
</div>
</body>
</html>
