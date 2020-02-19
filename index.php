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
					if (isset($_POST["search"])) {
						echo "pas encore codé";
					}
					//if !empty diplome 
					if (!empty($_POST["go"])) {
						$dip="";
						$dis="";
						$niv="";
						$form="";
						$reg="";
						$eta="";
						$ucc="";
						$pag="";

						if (empty($_POST["diplome"]) && empty($_POST["formation"]) && empty($_POST["secteur"]) && empty($_POST["cursuslib"]) && empty($_POST["region"]) && empty($_POST["ville"]) && empty($_POST["etablib"])) {
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
						$url= "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18".$dip.$dis.$niv.$form.$reg.$eta.$ucc.$pag."&timezone=Europe/Berlin";
						$contents = file_get_contents($url);
						//$contents = utf8_encode($contents);
						$results = json_decode($contents, true);

						echo "	
								<table id='table1'>
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
									print($value["fields"]["etablissement_lib"]);
									echo "</td>";?>
							    		<td><?php
							    		echo"<a href=";
							    		echo'"javascript:PopupCentrer(300,150,';
							    		echo"'menubar=no,status=no','popup.php?diplome=";
							    		print($value["fields"]["etablissement_lib"]);
							    		echo "&diplome2=";
							    		print($value["fields"]["etablissement_lib"]);
							    		echo"')";
							    		echo'">';
							    		?>


							    		<button class='tablinks button1'>Infos</button></a></td></tr>
							    	<?php
								}
								echo "<table>";

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
						<script>
						function PopupCentrer(largeur, hauteur, options,page) {
  var top=(screen.height-hauteur)/2;
  var left=(screen.width-largeur)/2;
  window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
}
</script>
							

</div>
</body>
<div id="footer">
	zebi
	<a href="">Pour en savoir plus</a>
</div>
</html>