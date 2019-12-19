<!DOCTYPE html>
<html>
<head>
	<title>Etud'sup</title>
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
						<button class="tablinks" onclick="openCity(event, 'a')"><label>Niveaux Etude▼</label></button><br>
					  <div id="a" class="tabcontent">
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
						<button class="tablinks" onclick="openCity(event, 'b')"><label>Diplome▼</label></button><br>
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
					  <button class="tablinks" onclick="openCity(event, 'Tokyo')"><label>Diplome▼</label></button><br>
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
					foreach($_POST['diplome'] as $val)
						{
						echo $val,'<br />';
						}
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
<div id="mapid"></div>
</div>
</body>
<script>
var mymap = L.map('mapid').setView([48.8391838, 2.5875129472268648], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Théo',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: "pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw"
}).addTo(mymap);
var marker = L.marker([48.8391838,  2.5875129472268648]).addTo(mymap);
marker.bindPopup("<b>IUT</b><br>You are here").openPopup();
	</script>
</html>
