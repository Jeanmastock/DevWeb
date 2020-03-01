<?php
	function facet($url,$id,$name){
		$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
		$contents = file_get_contents($url.$key);
		//$contents = utf8_encode($contents);
		$results = json_decode($contents, true);
		$array=array();
		
		foreach ($results["facet_groups"][$id]["facets"] as $value) {
			echo "<label class='container'>".$value["name"];
		  echo "<input type='checkbox' name='".$name."[]' value='".$value["name"]."'>";
		 echo " <span class='checkmark'></span>";
		echo "</label>";
		}
			//array_push($array, $value["name"]);
		/*
		$newarray = new ArrayObject($array);
		$newarray->asort();

		foreach ($newarray as $key => $val) {*/
			
		
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
	function top($url,$cle,$dom,$form,$annee){
			        $url .= "&refine.etablissement=".url_decode($cle);
			        $url .= "&refine.ins_lib=".url_decode($dom);
			        $url .= "&refine.diplome_lib=".url_decode($form);
			        $url .= "&refine.effectif_total=".url_decode($annee);
			        $url.= "&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
			        
			        $contents3 = file_get_contents($url, true);
			        $results3 = json_decode($contents3, true);

			        foreach($results3["records"] as $value) {
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
		    		echo"<i class='material-icons'>info</i></a>";
			        }

	}
?>