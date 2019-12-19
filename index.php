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
					  <button class="tablinks button1" onclick="openCity(event, 'London')"><label>Niveaux Etude▼</label></button><br>
					  <div id="London" class="tabcontent">
							<div class="nivetud">
								<label>Niveaux Etude</label><br>
								<label class="container">Bac+2
								  <input type="checkbox" name="bac+2">
								  <span class="checkmark"></span>
								</label>

								<label class="container">Bac+3
								  <input type="checkbox" name="bac+3">
								  <span class="checkmark"></span>
								</label>
								<label class="container">Bac+4
								  <input type="checkbox" name="bac+4">
								  <span class="checkmark"></span>
								</label>
								<label class="container">Bac+5
								  <input type="checkbox" name="bac+5">
								  <span class="checkmark"></span>
								</label>
							</div>
						</div>
						<button class="tablinks button1" onclick="openCity(event, 'formation')"><label>Formation▼</label></button><br>
						  <div id="formation" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=discipline_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								$contents = utf8_encode($contents);
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
						<button class="tablinks button1" onclick="openCity(event, 'a')"><label>Région▼</label></button><br>
					  <div id="a" class="tabcontent">
							<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=reg_etab_lib&refine.rentree_lib=2017-18";
								$contents = file_get_contents($url);
								$contents = utf8_encode($contents);
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
						<button class="tablinks button1" onclick="openCity(event, 'b')"><label>Diplome▼</label></button><br>
					  <div id="b" class="tabcontent">
							<!--<select name="diplome" id="">-->
								  	<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=diplome_lib&facet=diplome";
								$contents = file_get_contents($url);
								$contents = utf8_encode($contents);
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
					  <button class="tablinks button1" onclick="openCity(event, 'Tokyo')"><label>▼</label></button><br>
					  <div id="Tokyo" class="tabcontent">
								<div class="formation">		  
								<label class="container">BTS
									  <input type="checkbox" name="bts">
									  <span class="checkmark"></span>
								</label>
								<label class="container">FAC
									  <input type="checkbox" name="fac">
									  <span class="checkmark"></span>
								</label>
								</div>
						</div>
						<input type="reset" value="Reset"><br>
						<input type="submit" value="Confirmer" class="button button1" name="go" />
						</form>
				</div>
			</div>
	</div>
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
				if(!empty($_POST["diplome"])){
					?>
					<table>	
					<?php
					foreach($_POST['diplome'] as $val){
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.diplome_lib=".$val."&timezone=Europe/Berlin";
						$contents = file_get_contents($url);
						$contents = utf8_encode($contents);
						$results = json_decode($contents, true);
						echo "	
								
							  <tr>
								    <th>Diplome</th>
								    <th>libellé</th>
									<th>Région</th>
									<th>Ville</th>
									<th>Description</th>
							  </tr>";
								foreach ($results as $value) {
								if ($value["fields"]["diplome_lib"]==$val) {
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

						echo $val,'<br />';
						}
														?>
							</table> 
							<?php
				}
				 ?>
				 <?php 
				if(!empty($_POST["region"])){
					?>
					<table>	
					<?php
					foreach($_POST['region'] as $val){
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.reg_etab_lib=".$val."&timezone=Europe/Berlin";
						$contents = file_get_contents($url);
						$contents = utf8_encode($contents);
						$results = json_decode($contents, true);
						echo "	
								
							  <tr>
								    <th>Diplome</th>
								    <th>libellé</th>
									<th>Région</th>
									<th>Ville</th>
									<th>Description</th>
							  </tr>";
								foreach ($results as $value) {
								if ($value["fields"]["reg_etab_lib"]==$val) {
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

						echo $val,'<br />';
						}
														?>
							</table>
							<?php
				}
				 ?>
		<!--<script>
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
				$contents = utf8_encode($contents);
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
   			 <?php					
			if (isset($_POST["bts"])) {
				$x="Montpellier";
					$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.uucr_ins_lib=".$x."&timezone=Europe/Berlin";
					$contents = file_get_contents($url);
					$contents = utf8_encode($contents);
					$results = json_decode($contents, true);
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
</div>
</body>
</html>