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
 <li style="color: var(--b)"><a href="index.php">Etud'Sup</a></li>
  <li><a href="plus.php">En Savoir Plus</a></li>
</ul>
</nav>
<h1 id="haut"><span>Etud'Sup<br><a href="https://github.com/Jeanmastock/Etud-sup">Mon GitHub</a></span></h1>
<body>
<div id="infos"><h2>Mode Utilisations</h2>
<p>
	Vous vous posez peut-être la question de "Je suis futur bachelier ou étudiant en bac +x, à quelle formation puis-je m’inscrire l’an prochain et où ?" Etud-Sup est un site web qui vous aide à trouver votre formation en fonction de votre localisation ou encore votre futur domaine de prédilection.<br>
	Vous avez la possibilité d'activer énormément de filtres allant du niveau d'études à la région.<br>
	Il est aussi possible d'activer une limite de résultat pour ne pas avoir trop d'informations, ainsi que la possibilité de désactiver les marqueurs pour un recher plus rapide et optimal.
	
</p>
</div>
<div id="infos"><h2>Qu'est-ce que c'est?</h2>
<p>
	Etud-Sup est un site web qui utilise de l'open data, il ne contient pas de framework (Bootstrap, Symfony...),il est composé de sources ouverts (documentation, Stack overflow, ...) et aussi aider par le Benckmark (copier coller modifier dans la limite de la légalité).<br>
	Le site web est opérationnel Fonctionnel Ergonomie et Communicant en utilisant la technique des 3 clics (clair, rapide, simple).<br>
	J'ai dû passer par plusieurs phases pour réaliser ce projet comme la Conception puis la réalisation.<br>
	J'ai pu passer par plusieurs phases de réflexion, recherche, innovation et critique.<br>
	Ce site web a été réalisée avec HTML5, CSS3, PHP et JAVASCRIPT, J'ai pu intégrer une cartographie.
	
</p>
</div>
<div id="infos"><h2>Sitographie</h2>
<p>
	Ministère: <a href="https://www.interieur.gouv.fr/">Lien</a><br>
	Open-data: <a href="https://data.enseignementsup-recherche.gouv.fr/pages/home/">Lien</a><br>
	Stack Overflow: <a href="https://stackoverflow.com/">Lien</a>
	
</p>
</div>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
input[type=submit] {
  width: 100%;
  background-color: #5289EC;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #6495ed;
}

div {
  border-radius: 5px;
  padding: 20px;
}
</style>

<div>
  <form action="plus.php">
    <h2>Vos Suggestions</h2>
    <input type="text" placeholder="Votre Prénom..">

	<textarea placeholder="Vos suggestions.."></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>