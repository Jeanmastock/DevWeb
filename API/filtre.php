<form method="post">
							<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'diplome')" value="Diplome ▼"><br>
					  <div id="diplome" class="tabcontent">
							<!--<select name="diplome" id="">-->
								  	<?php
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=diplome_lib&facet=diplome";
								$id="0";
								$name="diplome";
								
								facet($url,$id,$name);
								 ?>
							<!--</select>-->
						</div>

						
						<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'formation')" value="Formation ▼"><br>
						  <div id="formation" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=discipline_lib&refine.rentree_lib=2017-18";
								$id="0";
								$name="formation";
								
								facet($url,$id,$name);
								
								 ?>
							</div>


						<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'secteur')" value="Secteur ▼"><br>
						  <div id="secteur" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=sect_disciplinaire_lib&refine.rentree_lib=2017-18";
								$id="0";
								$name="secteur";
								
								facet($url,$id,$name);
								
								 ?>
							</div>


						<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'cursuslib')" value="Niveau d'étude ▼"><br>
					  <div id="cursuslib" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=cursus_lmd_lib&facet=cursus_lmd_lib&refine.rentree_lib=2017-18";
								$id="1";
								$name="cursuslib";
								
								facet($url,$id,$name);
								 ?>
							</div>

							<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'region')" value="Région ▼"><br>
					  <div id="region" class="tabcontent">
							<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=reg_etab_lib&refine.rentree_lib=2017-18";
								$id="0";
								$name="region";
								
								facet($url,$id,$name);
								 ?>
						</div>


						<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'ville')" value="Ville ▼"><br>
					  	<div id="ville" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&facet=uucr_ins_lib&refine.rentree_lib=2017-18";
								$id="0";
								$name="ville";
								
								facet($url,$id,$name);
								 ?>
							</div>

						<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'etablib')" value="Etablissement ▼"><br>
					  <div id="etablib" class="tabcontent">
								<?php 
								$url= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=etablissement_lib&refine.rentree_lib=2017-18";
								$id="0";
								$name="etablib";
								
								facet($url,$id,$name);
								
								 ?>
							</div>
							<input type="button" class="button2 tablinks button1" onclick="openCity(event, 'pagination')" value="Limite ▼"><br>
					  <div id="pagination" class="tabcontent">
					  	<label class='container'>10
								<input type='checkbox' name='pagination[]' value='10'><span class='checkmark'></span>
						</label>
							<label class='container'>25
								<input type='checkbox' name='pagination[]' value='25'><span class='checkmark'></span>
						</label>
							<label class='container'>50
								<input type='checkbox' name='pagination[]' value='50'><span class='checkmark'></span>
						</label>
							<label class='container'>100
								<input type='checkbox' name='pagination[]' value='100'><span class='checkmark'></span>
						</label>
					  </div>
						<input type="reset" value="Reset" class="button1"><br>
						<input type="submit" value="Confirmer" class="button button1" name="go" />
						</form>