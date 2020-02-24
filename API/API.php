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
	function url_encode($string){
        return urlencode(utf8_encode($string));
    }
   
    function url_decode($string){
        return utf8_decode(urldecode($string));
    }
	function test($test){
	return "test";
	}
	function compteur(){

			session_start(); // DEMARRE LA SESSION
			// SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
			$hits =0;

			// TRAITEMENT SUR LE FICHIER TEXTE
			if(empty($hits)){
			$fp=fopen("../compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
			$num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
			fclose($fp); // FERME LE FICHIER
			$hits=$num - -1; // TRAITEMENT
			$fp=fopen("../compteur.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
			fputs($fp,$hits); // MET LA NOUVELLE VALEUR
			fclose($fp); // FERME LE FICHIER
			}
			else echo "no";
			// AFICHAGE DU COMPTEUR
			echo"<TABLE align=center>";
			echo"<TR>";
			echo"<TD STYLE='border:1pt Solid navy;' >";
			echo"<FONT FACE='Verdana, Arial, Helvetica, sans-serif' SIZE=1>";
			echo"Nombre de visiteurs :$hits";
			echo"</FONT>";
			echo"</TD>";
			echo"</TR>";
			echo"</TABLE>";
	}
?>