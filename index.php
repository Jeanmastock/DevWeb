<!DOCTYPE html>
<html>
<head>
	<title>Etud'sup</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
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
							<input type="button" class="tablinks button1" onclick="openCity(event, 'pagination')" value="Pagination▼"><br>
					  <div id="pagination" class="tabcontent">
					  pagination
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
									print($value["fields"]["etablissement_type_lib"]);
									echo "</td>";
									echo "
							    		<td><button>test</button></td></tr>";
								}
						}
						/*<!--<script>
		function myFunction() {
		  var x = document.getElementById("filtre");
		  if (x.style.display === "block") {
		    x.style.display = "none";
		  } else {
		    x.style.display = "block";
		  }
		}
		</script>-->
      <div class="element">
    <?php 
			if (isset($_POST["search"])) {
				$x=$_POST["search"];
				$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.uucr_ins_lib=".$x."&timezone=Europe/Berlin";
				$contents = file_get_contents($url);
				//$contents = utf8_encode($contents);
				$results = json_decode($contents, true);
				echo $_POST["search"];
				echo "	
				<table>		
				  <tr>
					    <th>Diplome</th>
					    <th>libellé</th>
						<th>Région</th>
						<th>Ville</th>
						<th>Description</th>
				  </tr>";
					foreach ($results as $value) {
					if ($value["fields"]["uucr_ins_lib"]==$x) {
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
						print($value["fields"]["reg_ins_lib"]);
						echo "</td>";
						echo "
				    		<td>";
						print($value["fields"]["uucr_ins_lib"]);
						echo "</td>";
						echo "
							    		<td><button>test</button></td></tr>";
					}
					}
					?>
				</table>
				<?php
				} ?>		
		</div>
		*/
						?>
							</table> 

</div>
</body>
</html>