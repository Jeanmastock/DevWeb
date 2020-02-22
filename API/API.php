<?php
	function facet($url,$id,$name){
		$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
		$contents = file_get_contents($url.$key);
		//$contents = utf8_encode($contents);
		$results = json_decode($contents, true);
		foreach ($results["facet_groups"][$id]["facets"] as $value) {
			echo "<label class='container'>".$value["name"];
		  echo "<input type='checkbox' name='".$name."[]' value='".$value["name"]."'>";
		 echo " <span class='checkmark'></span>";
		echo "</label>";
		}
	}
	function searchetab($name){
		$url="https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18&refine.etablissement=".$name."&timezone=Europe/Berlin";
		$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
		$contents = file_get_contents($url.$key);
		//$contents = utf8_encode($contents);
		$results = json_decode($contents, true);
		foreach ($results as $value) {
			echo "<h3 id='titre_info'>Université de Bourgogne</h3>
    		<h3>Informations générales</h3>
    		<li><b>Academie : </b>Dijon</li>
    		<li><b>Type de diplome : </b>Licence</li>
    		<li><b>Secteur : </b>Sciences de la vie</li><br>
    		<hr>
    		<h3>Informations sur les étudiants</h3><li><b>Nombre d'étudiants inscrits l'année derniere : </b>35</li>
    		<li><b>Nombres d'Hommes et de Femmes : </b>11 hommes et 24 femmes</li><br>
    		<hr>
    		<h3>Informations sur l'établissement</h3><li><b>Site web : </b>
    		<a href='http://www.u-bourgogne.fr/'>http://www.u-bourgogne.fr/</a></li><li><b>Adresse : </b>Esplanade Erasme</li></div>
			";
			print($value["fields"]["diplome_lib"]);
		}
	}
	function url_encode($string){
        return urlencode(utf8_encode($string));
    }
   
    function url_decode($string){
        return utf8_decode(urldecode($string));
    }
	function test($test){
	return "test";
	}
?>