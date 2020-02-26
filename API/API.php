<?php
	function facet($url,$id,$name){
		$key="&apikey=4543f20d282f86b4f963285aafae2f746f9224362fa5e6318da0a247";
		$contents = file_get_contents($url.$key);
		//$contents = utf8_encode($contents);
		$results = json_decode($contents, true);
		$array=array();
		
		foreach ($results["facet_groups"][$id]["facets"] as $value) {
			array_push($array, $value["name"]);
		}
		$newarray = new ArrayObject($array);
		$newarray->asort();

		foreach ($newarray as $key => $val) {
			echo "<label class='container'>".$val;
			echo "<input type='checkbox' name='".$val."[]' value='".$val."'>";
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
?>